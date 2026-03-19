<?php

use Illuminate\Support\Facades\Http;
use Podfather\PodfatherClient;
use Podfather\Resources\Jobs;
use Podfather\Resources\Runs;
use Podfather\Resources\Account;

beforeEach(function () {
    // Instantiate a fresh client before each test with dummy credentials
    $this->client = new PodfatherClient('https://api.example.com/v1', 'test-api-key');
});

it('dynamically resolves resource classes via magic method', function () {
    expect($this->client->jobs())->toBeInstanceOf(Jobs::class)
        ->and($this->client->runs())->toBeInstanceOf(Runs::class)
        ->and($this->client->account())->toBeInstanceOf(Account::class);
});

it('throws a BadMethodCallException for unregistered resources', function () {
    // Attempting to call a resource that doesn't exist
    $this->client->invoices();
})->throws(BadMethodCallException::class, 'Resource method [invoices] does not exist on PodfatherClient.');

it('strips trailing slashes from the base url', function () {
    $client = new PodfatherClient('https://api.example.com/v1/', 'test-key');
    
    // We can use reflection or simply make an HTTP fake to verify the outbound URL
    Http::fake([
        'https://api.example.com/v1/account' => Http::response(['status' => 'success']),
    ]);

    $client->account()->get();

    Http::assertSent(function (\Illuminate\Http\Client\Request $request) {
        return $request->url() === 'https://api.example.com/v1/account';
    });
});

it('sends the correct authorization headers and parses the response', function () {
    // 1. Fake the specific Podfather endpoint
    Http::fake([
        '*/jobs/12345' => Http::response([
            'data' => [
                'id' => 12345,
                'name' => 'Urgent Delivery'
            ]
        ], 200),
    ]);

    // 2. Perform the action
    $response = $this->client->jobs()->find(12345);

    // 3. Assert the response was parsed from JSON into an array correctly
    expect($response)
        ->toBeArray()
        ->toHaveKey('data.id', 12345)
        ->toHaveKey('data.name', 'Urgent Delivery');

    // 4. Assert the request was built properly by the core client
    Http::assertSent(function (\Illuminate\Http\Client\Request $request) {
        return $request->hasHeader('Authorization', 'Bearer test-api-key') &&
               $request->hasHeader('Accept', 'application/json') &&
               $request->method() === 'GET';
    });
});

it('can send post requests with payload data', function () {
    Http::fake([
        '*/vehicles' => Http::response(['data' => ['id' => 999]], 201),
    ]);

    $payload = [
        'vehicleRegistration' => 'BD51 SMR',
        'depot' => 123
    ];

    $response = $this->client->vehicles()->create($payload);

    expect($response['data']['id'])->toBe(999);

    Http::assertSent(function (\Illuminate\Http\Client\Request $request) use ($payload) {
        return $request->method() === 'POST' &&
               $request['vehicleRegistration'] === 'BD51 SMR';
    });
});
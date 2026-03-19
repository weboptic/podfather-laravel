<?php

use Podfather\Facades\Podfather;
use Podfather\PodfatherClient;

it('resolves the podfather client from the facade', function () {
    expect(Podfather::getFacadeRoot())->toBeInstanceOf(PodfatherClient::class);
});

it('can make api calls through the facade', function () {
    \Illuminate\Support\Facades\Http::fake([
        '*' => \Illuminate\Support\Facades\Http::response(['data' => 'success'], 200)
    ]);

    $response = Podfather::account()->get();

    expect($response['data'])->toBe('success');
});
<?php

namespace Podfather;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use BadMethodCallException;

readonly class PodfatherClient
{
    private string $baseUrl;

    public function __construct(string $baseUrl, private string $apiKey)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    protected function request(): PendingRequest
    {
        return Http::withToken($this->apiKey)
            ->acceptJson()
            ->baseUrl($this->baseUrl);
    }

    public function get(string $endpoint, array $query = []): mixed
    {
        return $this->request()->get($endpoint, $query)->throw()->json();
    }

    public function post(string $endpoint, array $data = []): mixed
    {
        return $this->request()->post($endpoint, $data)->throw()->json();
    }

    public function put(string $endpoint, array $data = []): mixed
    {
        return $this->request()->put($endpoint, $data)->throw()->json();
    }

    public function delete(string $endpoint): mixed
    {
        return $this->request()->delete($endpoint)->throw()->json();
    }

    public function __call($method, $parameters): mixed
    {
        $className = '\\Podfather\\Resources\\' . ucfirst($method);

        if (class_exists($className)) {
            return new $className($this);
        }

        throw new BadMethodCallException("Resource method [{$method}] does not exist on PodfatherClient.");
    }
}
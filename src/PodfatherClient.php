<?php

namespace Podfather;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use BadMethodCallException;
use Podfather\Exceptions\PodfatherException;

readonly class PodfatherClient
{
    private string $baseUrl;

    /**
     * @param string $baseUrl
     * @param string $apiKey
     */
    public function __construct(string $baseUrl, private string $apiKey)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    /**
     * @return PendingRequest
     */
    protected function request(): PendingRequest
    {
        return Http::withToken($this->apiKey)
            ->acceptJson()
            ->baseUrl($this->baseUrl);
    }

    /**
     * @param string $endpoint
     * @param array $query
     * @return mixed
     * @throws PodfatherException|ConnectionException
     */
    public function get(string $endpoint, array $query = []): mixed
    {
        try {
            return $this->request()->get($endpoint, $query)->throw()->json();
        } catch (RequestException $e) {
            PodfatherException::fromException($e);
        }
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return mixed
     * @throws PodfatherException|ConnectionException
     */
    public function post(string $endpoint, array $data = []): mixed
    {
        try {
            return $this->request()->post($endpoint, $data)->throw()->json();
        } catch (RequestException $e) {
            PodfatherException::fromException($e);
        }
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return mixed
     * @throws PodfatherException|ConnectionException
     */
    public function put(string $endpoint, array $data = []): mixed
    {
        try {
            return $this->request()->put($endpoint, $data)->throw()->json();
        } catch (RequestException $e) {
            PodfatherException::fromException($e);
        }
    }

    /**
     * @param string $endpoint
     * @return mixed
     * @throws PodfatherException|ConnectionException
     */
    public function delete(string $endpoint): mixed
    {
        try {
            return $this->request()->delete($endpoint)->throw()->json();
        } catch (RequestException $e) {
            PodfatherException::fromException($e);
        }
    }

    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters): mixed
    {
        $className = '\\Podfather\\Resources\\' . ucfirst($method);

        if (class_exists($className)) {
            return new $className($this);
        }

        throw new BadMethodCallException("Resource method [{$method}] does not exist on PodfatherClient.");
    }
}

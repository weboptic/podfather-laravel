<?php

namespace Podfather\Resources;

use Illuminate\Http\Client\ConnectionException;
use Podfather\Exceptions\PodfatherException;

class Vehicles extends Resource
{
    /**
     * @param array $params
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function get(array $params = []): mixed
    {
        return $this->client->get('vehicles', $params);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function find(int $id): mixed
    {
        return $this->client->get("vehicles/{$id}");
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function create(array $data): mixed
    {
        return $this->client->post('vehicles', $data);
    }
}

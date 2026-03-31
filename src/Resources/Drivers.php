<?php

namespace Podfather\Resources;

use Illuminate\Http\Client\ConnectionException;
use Podfather\Exceptions\PodfatherException;

class Drivers extends Resource
{
    /**
     * @param array $params
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function get(array $params = []): mixed
    {
        return $this->client->get('drivers', $params);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function find(int $id): mixed
    {
        return $this->client->get("drivers/{$id}");
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function create(array $data): mixed
    {
        return $this->client->post('drivers', $data);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function delete(int $id): mixed
    {
        return $this->client->delete("drivers/{$id}");
    }
}

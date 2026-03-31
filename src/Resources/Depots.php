<?php

namespace Podfather\Resources;

use Illuminate\Http\Client\ConnectionException;
use Podfather\Exceptions\PodfatherException;

class Depots extends Resource
{
    /**
     * @param array $params
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function get(array $params = []): mixed
    {
        return $this->client->get('depots', $params);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function find(int $id): mixed
    {
        return $this->client->get("depots/{$id}");
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function create(array $data): mixed
    {
        return $this->client->post('depots', $data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function update(int $id, array $data): mixed
    {
        return $this->client->put("depots/{$id}", $data);
    }
}

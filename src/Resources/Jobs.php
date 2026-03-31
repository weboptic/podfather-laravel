<?php

namespace Podfather\Resources;

use Illuminate\Http\Client\ConnectionException;
use Podfather\Exceptions\PodfatherException;

class Jobs extends Resource
{
    /**
     * @param array $params
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function get(array $params = []): mixed
    {
        return $this->client->get('jobs', $params);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function find(int $id): mixed
    {
        return $this->client->get("jobs/{$id}");
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function create(array $data): mixed
    {
        return $this->client->post('jobs', $data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function update(int $id, array $data): mixed
    {
        return $this->client->put("jobs/{$id}", $data);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function delete(int $id): mixed
    {
        return $this->client->delete("jobs/{$id}");
    }
}

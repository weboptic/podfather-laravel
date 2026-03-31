<?php

namespace Podfather\Resources;

use Illuminate\Http\Client\ConnectionException;
use Podfather\Exceptions\PodfatherException;

class Templates extends Resource
{
    /**
     * @param array $params
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function get(array $params = []): mixed
    {
        return $this->client->get('templates', $params);
    }

    /**
     * @param int $id
     * @param array $params
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function find(int $id, array $params = []): mixed
    {
        return $this->client->get("templates/{$id}", $params);
    }
}

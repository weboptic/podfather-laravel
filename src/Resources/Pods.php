<?php

namespace Podfather\Resources;

use Illuminate\Http\Client\ConnectionException;
use Podfather\Exceptions\PodfatherException;

class Pods extends Resource
{
    /**
     * @param array $params
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function get(array $params = []): mixed
    {
        return $this->client->get('pods', $params);
    }

    /**
     * @param int $podId
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function pdf(int $podId): mixed
    {
        return $this->client->get("podPdf/{$podId}");
    }

    /**
     * @param int $podId
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function images(int $podId): mixed
    {
        return $this->client->get("podImages/{$podId}");
    }

    /**
     * @param int $podId
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function signatures(int $podId): mixed
    {
        return $this->client->get("podSignatures/{$podId}");
    }
}

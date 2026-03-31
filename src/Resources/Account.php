<?php

namespace Podfather\Resources;

use Illuminate\Http\Client\ConnectionException;
use Podfather\Exceptions\PodfatherException;

class Account extends Resource
{
    /**
     * @return mixed
     * @throws ConnectionException|PodfatherException
     */
    public function get(): mixed
    {
        return $this->client->get('account');
    }
}

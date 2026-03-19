<?php

namespace Podfather\Resources;

class Account extends Resource
{
    public function get()
    {
        return $this->client->get('account');
    }
}
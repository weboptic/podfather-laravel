<?php

namespace Podfather\Resources;

class Templates extends Resource
{
    public function get(array $params = [])
    {
        return $this->client->get('templates', $params);
    }

    public function find(int $id, array $params = [])
    {
        return $this->client->get("templates/{$id}", $params);
    }
}
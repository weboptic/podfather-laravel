<?php

namespace Podfather\Resources;

class Vehicles extends Resource
{
    public function get(array $params = [])
    {
        return $this->client->get('vehicles', $params);
    }

    public function find(int $id)
    {
        return $this->client->get("vehicles/{$id}");
    }

    public function create(array $data)
    {
        return $this->client->post('vehicles', $data);
    }
}
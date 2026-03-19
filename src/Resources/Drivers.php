<?php

namespace Podfather\Resources;

class Drivers extends Resource
{
    public function get(array $params = [])
    {
        return $this->client->get('drivers', $params);
    }

    public function find(int $id)
    {
        return $this->client->get("drivers/{$id}");
    }

    public function create(array $data)
    {
        return $this->client->post('drivers', $data);
    }

    public function delete(int $id)
    {
        return $this->client->delete("drivers/{$id}");
    }
}
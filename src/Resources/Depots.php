<?php

namespace Podfather\Resources;

class Depots extends Resource
{
    public function get(array $params = [])
    {
        return $this->client->get('depots', $params);
    }

    public function find(int $id)
    {
        return $this->client->get("depots/{$id}");
    }

    public function create(array $data)
    {
        return $this->client->post('depots', $data);
    }

    public function update(int $id, array $data)
    {
        return $this->client->put("depots/{$id}", $data);
    }
}
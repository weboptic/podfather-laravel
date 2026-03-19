<?php

namespace Podfather\Resources;

class Jobs extends Resource
{
    public function get(array $params = [])
    {
        return $this->client->get('jobs', $params);
    }

    public function find(int $id)
    {
        return $this->client->get("jobs/{$id}");
    }

    public function create(array $data)
    {
        return $this->client->post('jobs', $data);
    }

    public function update(int $id, array $data)
    {
        return $this->client->put("jobs/{$id}", $data);
    }

    public function delete(int $id)
    {
        return $this->client->delete("jobs/{$id}");
    }
}
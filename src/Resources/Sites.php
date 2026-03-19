<?php

namespace Podfather\Resources;

class Sites extends Resource
{
    public function get(array $params = [])
    {
        return $this->client->get('sites', $params);
    }

    public function find(int $id)
    {
        return $this->client->get("sites/{$id}");
    }

    public function create(array $data)
    {
        return $this->client->post('sites', $data);
    }

    public function update(int $id, array $data)
    {
        return $this->client->put("sites/{$id}", $data);
    }
}
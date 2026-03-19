<?php

namespace Podfather\Resources;

class Customers extends Resource
{
    public function get(array $params = [])
    {
        return $this->client->get('customers', $params);
    }

    public function find(int $id)
    {
        return $this->client->get("customers/{$id}");
    }

    public function create(array $data)
    {
        return $this->client->post('customers', $data);
    }

    public function update(int $id, array $data)
    {
        return $this->client->put("customers/{$id}", $data);
    }
}
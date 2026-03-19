<?php

namespace Podfather\Resources;

class Runs extends Resource
{
    public function get(array $params = [])
    {
        return $this->client->get('runs', $params);
    }

    public function find(int $id)
    {
        return $this->client->get("runs/{$id}");
    }

    public function create(array $data)
    {
        return $this->client->post('runs', $data);
    }
    
    public function release(int $id)
    {
        return $this->client->post("runs/{$id}/release");
    }
}
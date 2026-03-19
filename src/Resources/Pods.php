<?php

namespace Podfather\Resources;

class Pods extends Resource
{
    public function get(array $params = [])
    {
        return $this->client->get('pods', $params);
    }

    public function pdf(int $podId)
    {
        return $this->client->get("podPdf/{$podId}");
    }

    public function images(int $podId)
    {
        return $this->client->get("podImages/{$podId}");
    }

    public function signatures(int $podId)
    {
        return $this->client->get("podSignatures/{$podId}");
    }
}
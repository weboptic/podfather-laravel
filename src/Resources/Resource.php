<?php

namespace Podfather\Resources;

use Podfather\PodfatherClient;

abstract class Resource
{
    public function __construct(protected PodfatherClient $client)
    {
        //
    }
}
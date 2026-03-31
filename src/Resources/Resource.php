<?php

namespace Podfather\Resources;

use Podfather\PodfatherClient;

abstract class Resource
{
    /**
     * @param PodfatherClient $client
     */
    public function __construct(protected PodfatherClient $client)
    {
        //
    }
}

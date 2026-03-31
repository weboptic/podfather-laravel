<?php

namespace Podfather\Facades;

use Illuminate\Support\Facades\Facade;
use Podfather\PodfatherClient;

class Podfather extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return PodfatherClient::class;
    }
}

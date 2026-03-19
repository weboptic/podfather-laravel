<?php

namespace Podfather\Facades;

use Illuminate\Support\Facades\Facade;
use Podfather\PodfatherClient;

class Podfather extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PodfatherClient::class;
    }
}
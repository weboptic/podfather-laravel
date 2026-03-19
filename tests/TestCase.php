<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Podfather\PodfatherServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            PodfatherServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('podfather.base_url', 'https://api.example.com/v1');
        $app['config']->set('podfather.api_key', 'test-api-key');
    }
}
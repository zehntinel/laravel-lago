<?php

namespace Zehntinel\LaravelLago\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Zehntinel\LaravelLago\LagoService
 */
class LaravelLago extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Zehntinel\LaravelLago\LagoService::class;
    }
}

<?php

namespace Zehntinel\LaravelLago\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Zehntinel\LaravelLago\LaravelLago
 */
class LaravelLago extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Zehntinel\LaravelLago\LaravelLago::class;
    }
}

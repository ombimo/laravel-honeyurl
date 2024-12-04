<?php

namespace Ombimo\LaravelHoneyurl\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ombimo\LaravelHoneyurl\LaravelHoneyurl
 */
class LaravelHoneyurl extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Ombimo\LaravelHoneyurl\LaravelHoneyurl::class;
    }
}

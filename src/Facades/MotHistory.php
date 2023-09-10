<?php

namespace ImaginativeImpact\LaravelMotHistory\Facades;

use Illuminate\Support\Facades\Facade;

class MotHistory extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'mot-history';
    }
}
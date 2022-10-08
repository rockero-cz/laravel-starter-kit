<?php

namespace Rockero\StarterKit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rockero\StarterKit\StarterKit
 */
class StarterKit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Rockero\StarterKit\StarterKit::class;
    }
}

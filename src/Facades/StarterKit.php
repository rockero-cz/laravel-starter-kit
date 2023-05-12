<?php

namespace Rockero\StarterKit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rockero\StarterKit\StarterKit
 */
class StarterKit extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return \Rockero\StarterKit\StarterKit::class;
    }
}

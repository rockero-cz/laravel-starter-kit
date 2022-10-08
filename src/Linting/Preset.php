-<?php

namespace Rockero\StarterKit\Linting;

use Tighten\TLint\Linters\ApplyMiddlewareInRoutes;
use Tighten\TLint\Linters\ClassThingsOrder;
use Tighten\TLint\Linters\ImportFacades;
use Tighten\TLint\Linters\MailableMethodsInBuild;
use Tighten\TLint\Linters\ModelMethodOrder;
use Tighten\TLint\Linters\NoDump;
use Tighten\TLint\Linters\NoRequestAll;
use Tighten\TLint\Linters\RequestValidation;
use Tighten\TLint\Linters\RestControllersMethodOrder;
use Tighten\TLint\Linters\UseAuthHelperOverFacade;
use Tighten\TLint\Linters\UseConfigOverEnv;
use Tighten\TLint\Presets\PresetInterface;

class Preset implements PresetInterface
{
    public function getLinters(): array
    {
        return [
            ApplyMiddlewareInRoutes::class,
            ClassThingsOrder::class,
            MailableMethodsInBuild::class,
            NoDump::class,
            RequestValidation::class,
            RestControllersMethodOrder::class,
            UseAuthHelperOverFacade::class,
            UseConfigOverEnv::class,

            // ImportFacades::class,
            // NoRequestAll::class,
            // ModelMethodOrder::class,
        ];
    }

    public function getFormatters(): array
    {
        return [];
    }
}

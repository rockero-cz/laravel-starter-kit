<?php

namespace Rockero\StarterKit\Linting;

use Tighten\TLint\Linters;
use Tighten\TLint\Presets\PresetInterface;

class Preset implements PresetInterface
{
    public function getLinters(): array
    {
        return [
            Linters\ApplyMiddlewareInRoutes::class,
            Linters\ClassThingsOrder::class,
            Linters\MailableMethodsInBuild::class,
            Linters\NoDump::class,
            Linters\RequestValidation::class,
            Linters\RestControllersMethodOrder::class,
            Linters\UseAuthHelperOverFacade::class,
            Linters\UseConfigOverEnv::class,
            Linters\ImportFacades::class,
            Linters\NoRequestAll::class,
            Linters\ModelMethodOrder::class,
        ];
    }

    public function getFormatters(): array
    {
        return [];
    }
}

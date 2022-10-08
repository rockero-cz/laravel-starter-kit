<?php

namespace Rockero\StarterKit;

use Rockero\StarterKit\Commands\LintCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StarterKitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('starter-kit')
            ->hasCommand(LintCommand::class);
    }
}

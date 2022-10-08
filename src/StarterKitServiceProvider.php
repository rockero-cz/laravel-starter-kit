<?php

namespace Rockero\StarterKit;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rockero\StarterKit\Commands\LintCommand;

class StarterKitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('starter-kit')
            ->hasCommand(LintCommand::class);
    }
}

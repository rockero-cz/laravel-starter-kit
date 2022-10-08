<?php

namespace Rockero\StarterKit;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rockero\StarterKit\Commands\StarterKitCommand;

class StarterKitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('starter-kit')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_starter-kit_table')
            ->hasCommand(StarterKitCommand::class);
    }
}

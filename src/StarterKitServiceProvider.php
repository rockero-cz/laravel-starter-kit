<?php

namespace Rockero\StarterKit;

use Rockero\StarterKit\Commands\InstallCommand;
use Rockero\StarterKit\Commands\LintCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StarterKitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('starter-kit')
            ->hasCommand(LintCommand::class)
            ->hasCommand(InstallCommand::class);
    }

    public function boot()
    {
        parent::boot();

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'courier');

        $this->publishes([
            __DIR__.'/../tlint.json' => $this->app->basePath('tlint.json'),
        ], );
    }
}

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

        $this->publishes([
            __DIR__.'/../stubs/tlint.stub' => $this->app->basePath('tlint.json'),
            __DIR__.'/../stubs/pint.stub' => $this->app->basePath('pint.json'),
            __DIR__.'/../stubs/phpstan.stub' => $this->app->basePath('phpstan.neon'),
            __DIR__.'/../stubs/laravel' => $this->app->basePath('stubs'),
        ], );
    }
}

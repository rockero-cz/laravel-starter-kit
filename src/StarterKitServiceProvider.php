<?php

namespace Rockero\StarterKit;

use Rockero\StarterKit\Commands\ActionMakeCommand;
use Rockero\StarterKit\Commands\ClassMakeCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StarterKitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('rockero')
            ->hasConfigFile('rockero')
            // Feature commands
            ->hasCommand(ClassMakeCommand::class)
            ->hasCommand(ActionMakeCommand::class)
            // Installation command
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->callSilent('vendor:publish', [
                            '--provider' => 'Rockero\\StarterKit\\StarterKitServiceProvider',
                            '--force' => true,
                        ]);
                    })
                    ->publishConfigFile()
                    ->askToStarRepoOnGitHub('rockero-cz/starter-kit');
            });
    }

    public function boot()
    {
        parent::boot();

        $this->publishes([
            // Configuration stubs
            __DIR__.'/../stubs/duster.stub' => $this->app->basePath('duster.json'),
            __DIR__.'/../stubs/phpstan.stub' => $this->app->basePath('phpstan.neon'),
            __DIR__.'/../stubs/pint.stub' => $this->app->basePath('pint.json'),
            __DIR__.'/../stubs/tlint.stub' => $this->app->basePath('tlint.json'),
            __DIR__.'/../stubs/env-testing.stub' => $this->app->basePath('.env.testing'),
            // Laravel stubs
            __DIR__.'/../stubs/laravel' => $this->app->basePath('stubs'),
            // Tests stubs
            __DIR__.'/../stubs/tests/pest.stub' => $this->app->basePath('tests/Pest.php'),
            __DIR__.'/../stubs/tests/Unit/example-test.stub' => $this->app->basePath('tests/Unit/ExampleTest.php'),
            __DIR__.'/../stubs/tests/Feature/architecture-test.stub' => $this->app->basePath('tests/Feature/ArchitectureTest.php'),
            __DIR__.'/../stubs/tests/Feature/example-test.stub' => $this->app->basePath('tests/Feature/ExampleTest.php'),
        ]);
    }
}

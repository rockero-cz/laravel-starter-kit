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
            ->name('starter-kit')
            ->hasConfigFile('starter-kit')
            // Feature commands
            ->hasCommand(ClassMakeCommand::class)
            ->hasCommand(ActionMakeCommand::class)
            // Installation command
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        if ($command->confirm('Would you like to publish a GitHub Actions workflows?')) {
                            $command->comment('Publishing GitHub Actions workflows...');

                            $this->publishes([
                                __DIR__.'/../stubs/workflows/ci.stub' => $this->app->basePath('.github/workflows/ci.yml'),
                            ]);
                        }

                        $command->callSilent('vendor:publish', [
                            '--provider' => 'Rockero\\StarterKit\\StarterKitServiceProvider',
                            '--force' => true,
                        ]);
                    })
                    ->askToStarRepoOnGitHub('rockero-cz/laravel-starter-kit');
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
            __DIR__.'/../stubs/config/project.stub' => $this->app->basePath('config/project.php'),
            // Tests stubs
            __DIR__.'/../stubs/tests/pest.stub' => $this->app->basePath('tests/Pest.php'),
            __DIR__.'/../stubs/tests/Unit/example-test.stub' => $this->app->basePath('tests/Unit/ExampleTest.php'),
            __DIR__.'/../stubs/tests/Feature/architecture-test.stub' => $this->app->basePath('tests/Feature/ArchitectureTest.php'),
            __DIR__.'/../stubs/tests/Feature/example-test.stub' => $this->app->basePath('tests/Feature/ExampleTest.php'),
            // Laravel stubs
            __DIR__.'/../stubs/laravel' => $this->app->basePath('stubs'),
        ]);
    }
}

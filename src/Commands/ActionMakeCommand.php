<?php

namespace Rockero\StarterKit\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputOption;

#[AsCommand(name: 'make:action')]
class ActionMakeCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    protected $name = 'make:action';

    protected $description = 'Create a new action';

    protected $type = 'Action';

    /**
     * Get the stub file for the generator.
     */
    protected function getStub(): string
    {
        $stub = '/stubs/action.stub';

        return $this->laravel->basePath($stub);
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Create the action even if the action already exists'],
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Actions';
    }
}

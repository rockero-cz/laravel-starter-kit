<?php

namespace Rockero\StarterKit\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputOption;

#[AsCommand(name: 'make:class')]
class ClassMakeCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    /** @var string */
    protected $name = 'make:class';

    /** @var string */
    protected $description = 'Create a new class';

    /** @var string */
    protected $type = 'Class';

    /**
     * Get the stub file for the generator.
     */
    protected function getStub(): string
    {
        $stub = '/stubs/class.stub';

        if ($this->option('construct')) {
            $stub = '/stubs/class.construct.stub';
        }

        if ($this->option('invokable')) {
            $stub = '/stubs/class.invokable.stub';
        }

        return $this->laravel->basePath($stub);
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the class already exists'],
            ['construct', 'c', InputOption::VALUE_NONE, 'Generate a construct method'],
            ['invokable', 'i', InputOption::VALUE_NONE, 'Generate an invoke method'],
        ];
    }
}

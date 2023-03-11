<?php

namespace Rockero\StarterKit\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    public $signature = 'rockero:install';

    public $description = 'Install starter kit';

    public function handle(): void
    {
        if ($this->ask('Do you wish to setup CI?')) {
            exec('composer require rockero-cz/ci');

            $this->call('vendor:publish', ['--provider' => 'Rockero\\CI\\CIServiceProvider', '--force' => true]);
        }

        $this->call('vendor:publish', ['--provider' => 'Rockero\\StarterKit\\StarterKitServiceProvider', '--force' => true]);
    }
}

<?php

namespace Rockero\StarterKit\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    public $signature = 'rockero:install';

    /**
     * The console command description.
     *
     * @var string
     */
    public $description = 'Install starter kit';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if ($this->ask('Do you wish to setup CI?')) {
            exec('composer require rockero-cz/ci');

            $this->call('vendor:publish', ['--provider' => 'Rockero\\CI\\CIServiceProvider', '--force' => true]);
        }

        $this->call('vendor:publish', ['--provider' => 'Rockero\\StarterKit\\StarterKitServiceProvider', '--force' => true]);
    }
}

<?php

namespace Rockero\StarterKit\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    public $signature = 'rockero:install';

    public $description = 'Install starter kit';

    public function handle(): void
    {
        $this->call('vendor:publish', ['--provider' => 'Rockero\\StarterKit\\StarterKitServiceProvider']);
    }
}

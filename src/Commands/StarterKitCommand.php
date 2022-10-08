<?php

namespace Rockero\StarterKit\Commands;

use Illuminate\Console\Command;

class StarterKitCommand extends Command
{
    public $signature = 'starter-kit';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

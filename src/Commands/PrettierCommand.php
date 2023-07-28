<?php

namespace Rockero\StarterKit\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class PrettierCommand extends Command
{
    protected $name = 'prettier';

    protected $description = 'Format resources by prettier.';

    /**
     * Run prettier formatting.
     */
    public function handle()
    {
        $this->info('Formatting...');
        $this->newLine();

        $result = Process::path(base_path())
            ->run('npx prettier --write resources/', function (string $type, string $output) {
                echo $output;
            });

        $this->newLine();

        if ($result->failed()) {
            $this->error("\n[ERROR] Found some errors");
        } else {
            $this->info("\n[SUCCESS] No errors found");
        }
    }
}

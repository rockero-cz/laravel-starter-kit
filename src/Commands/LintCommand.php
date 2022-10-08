<?php

namespace Rockero\StarterKit\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Illuminate\Support\Str;

class LintCommand extends Command
{
    public $signature = 'rockero:lint {--json}';

    public $description = 'Run linter';

    protected array $errors = [];

    public function handle(): int
    {
        $process = Process::fromShellCommandline('./vendor/bin/tlint');

        $file = '';
        $message = '';

        $process->setTimeout(null)->run(function ($type, $output) use (&$file, &$message) {
            $lines = explode("\n", $output);

            // Parses and reformats tlint output like:
            //
            //   Lints for /User/rockero/www/laravel/app/Models/User.php
            //   =======
            //   ! Imports should be order automatically
            //   5 : `use Illuminate\Foundation\Bus\DispatchesJobs;`
            
            foreach ($lines as $line) {
                // File
                if (str_starts_with($line, 'Lints for')) {
                    $file = Str::after($line, 'Lints for ' . base_path() . '/');
                }

                // Error
                else if (str_starts_with($line, '!')) {
                    $message = Str::after($line, '! ');
                }

                // Line number (possibly)
                else if ($line = Str::before($line, ' : `')) {
                    if (! is_numeric($line)) {
                        continue;
                    }

                    $this->outputError($file, $message, $line);
                }
            }
        });

        return $this->processOutput();
    }

    protected function processOutput(): int
    {
        if ($this->errors) {
            if ($this->option('json')) {
                echo json_encode($this->errors);
            } else {
                $this->newLine();

                return Command::INVALID;
            }
        }

        return Command::SUCCESS;
    }
    
    protected function outputError(string $file, string $message, string $line): void
    {
        $this->errors[] = compact('file', 'message', 'line');

        if (! $this->option('json')) {
            $this->output->writeLn("\n  <fg=black;bg=red;options=bold> FAIL </><fg=default> {$file}:{$line}</>");
            $this->output->writeLn("  <fg=red;options=bold>⨯</><fg=default> \e[2m{$message}\e[22m</>");
        }
    }
}

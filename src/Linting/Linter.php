<?php

namespace Rockero\StarterKit\Linting;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use RuntimeException;
use Symfony\Component\Process\Process;

class Linter
{
    /**
     * Eager load all errors into a collection.
     *
     * @return Collection<LintError>
     */
    public static function collect(): Collection
    {
        return tap(collect(), function (Collection $errors) {
            self::run(function (LintError $error) use ($errors) {
                $errors->push($error);
            });
        });
    }

    /**
     * Lazily execute a callback over each error.
     *
     * @param  callable(LintError)  $callback
     */
    public static function run($callback): void
    {
        /**
         * Parse tlint output similar to:
         *
         *  Lints for /User/rockero/www/laravel/app/Models/User.php
         *  =======
         *  ! Imports should be ordered alphabetically.
         *  5 : `use Illuminate\Notifications\Notifiable;`
         *  6 : `use Illuminate\Foundation\Auth\User as Authenticatable;`
         */
        $file = '';
        $message = '';

        self::readOutput(function ($line) use (&$file, &$message, $callback) {
            if (Str::startsWith($line, 'Lints for')) {
                $file = Str::after($line, 'Lints for '.base_path().'/');
            } elseif (Str::startsWith($line, '!')) {
                $message = Str::after($line, '! ');
            } elseif ($line = Str::match('/^(\d+)/', $line)) {
                $callback(new LintError($file, (int) $line, $message));
            }
        });
    }

    /**
     * Read output from tlint line by line.
     */
    private static function readOutput(callable $callback): void
    {
        $process = Process::fromShellCommandline('./vendor/bin/tlint');
        $output = '';

        $process->setTimeout(null)->run(function ($type, $buffer) use ($callback, &$output) {
            $lines = explode("\n", $buffer);

            foreach ($lines as $line) {
                $output .= $line;

                $callback($line);
            }
        });

        if ($process->getExitCode() > 0 && ! str_contains($output, 'Lints for')) {
            throw new RuntimeException($output);
        }
    }
}

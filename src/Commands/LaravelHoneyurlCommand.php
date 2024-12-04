<?php

namespace Ombimo\LaravelHoneyurl\Commands;

use Illuminate\Console\Command;

class LaravelHoneyurlCommand extends Command
{
    public $signature = 'laravel-honeyurl';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

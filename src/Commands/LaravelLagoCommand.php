<?php

namespace Zehntinel\LaravelLago\Commands;

use Illuminate\Console\Command;

class LaravelLagoCommand extends Command
{
    public $signature = 'laravel-lago';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

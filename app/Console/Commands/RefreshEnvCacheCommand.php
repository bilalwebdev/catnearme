<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RefreshEnvCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh ENV cache';

    public function handle()
    {
        system('clear');

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        echo 'Done' . PHP_EOL;
    }
}
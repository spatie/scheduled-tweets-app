<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [

    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('tweet-scheduled-tweets')->hourlyAt();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}

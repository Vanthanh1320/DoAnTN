<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        'App\Console\Commands\PostCommand',
        'App\Console\Commands\sendMailAutomatic',
    ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();


//        $schedule->call(function () {
//            DB::table('recruitment')->where('expire','<',now())->update(['status' => 0]);
//        })->everyMinute();

//        ->daily('00:00')
        $schedule->command('recruitment:update')->everyMinute();
        $schedule->command('recruitment:select')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

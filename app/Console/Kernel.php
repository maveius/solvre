<?php

namespace Solvre\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Solvre\Console\Commands\Inspire;
use Solvre\Console\Commands\MailSender;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Inspire::class,
        MailSender::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $sendMail = env('MAIL_SEND', false);
        if($sendMail) {
            $schedule->command('mails:sender')
                ->everyFiveMinutes();
        }
    }
}

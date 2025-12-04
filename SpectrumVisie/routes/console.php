<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\ExpireUsers;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


app()->booted(function () {
    // app()->booted makes sure everything in laravel is initialized like the scheduler
    $schedule = app(Schedule::class);
    //Get the function so i can use it
    $schedule->command('users:expire')->daily();
});

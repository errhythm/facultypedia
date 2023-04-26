<?php

namespace App\Console;

use App\Models\Consultations;
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
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // Check the consultations model for any expired consultations and change 'is_approved' to 'Completed' every 10 minutes
        $schedule->call(function () {
            $consultations = Consultations::where('is_approved', 'Approved')->get();
            foreach ($consultations as $consultation) {
                if ($consultation->complete_time < now()) {
                    $consultation->is_approved = 'Completed';
                    $consultation->updated_at = now();
                    $consultation->save();
                }
            }
        })->everyMinute();

        $schedule->call(function () {
            $consultations = Consultations::where('is_approved', 'Pending')->get();
            foreach ($consultations as $consultation) {
                if ($consultation->complete_time < now()) {
                    $consultation->is_approved = 'Cancelled';
                    $consultation->updated_at = now();
                    $consultation->save();
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

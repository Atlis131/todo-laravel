<?php

namespace App\Console\Commands;

use App\Mail\TaskNotification;
use App\Models\Task;
use App\Models\User;
use Illuminate\Console\Command;
use DateTime;
use Illuminate\Support\Facades\Mail;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info("Cron Job running at ". now());

        $today = new DateTime('now');
        $tomorrow = $today->modify('+1 day')->format('Y-m-d');

        $tasks = Task::where('due', $tomorrow)->whereNot('status', 3)->get();

        foreach ($tasks as $task) {
            $user = User::where('id', $task->user_id)->first();

            Mail::to($user->email)->send(new TaskNotification($user, $task));
        }

        die();

    }
}

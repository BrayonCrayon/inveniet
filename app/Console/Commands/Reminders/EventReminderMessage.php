<?php

namespace App\Console\Commands\Reminders;

use App\Event;
use Illuminate\Console\Command;

class EventReminderMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:event-reminder {daysUntilEvent}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders to attendees of an event before it begins';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Event::withinDays($this->argument('daysUntilEvent'))->get()->each(function ($event) {
            $event->notifyAttendees();
        });
    }
}

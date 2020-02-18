<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailEventReminder extends Mailable
{
    use Queueable, SerializesModels;
    private $event;
    private $attendeeName;

    /**
     * Create a new message instance.
     *
     * @param $event
     * @param $attendeeName
     */
    public function __construct($event, $attendeeName)
    {
        $this->event = $event;
        $this->attendeeName = $attendeeName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mail@example.com', 'Mailtrap')
        ->subject('Inveniet Event Reminder')
        ->with([
                   'name' => $this->attendeeName,
                   'eventName' => $this->event->name,
                   'starts_at' => Carbon::parse($this->event->starts_at)->toDayDateTimeString()
               ])
        ->markdown('mails.mail');
    }
}

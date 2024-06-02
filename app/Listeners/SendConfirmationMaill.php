<?php

namespace App\Listeners;

use App\Events\RegisteredCustom;
use App\Mail\UserRegisteredNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmationMaill
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisteredCustom $event): void
    {
        

        //Instruction for sending an email
        Mail::to($event->user)->send(new UserRegisteredNotification($event->user));
    }
}

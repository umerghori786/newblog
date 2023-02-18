<?php

namespace App\Listeners;

use App\Evenets\OrderShipped;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShippedMail;
use App\Mail\welcomeemail;

class SendShipmentNotification implements ShouldQueue  //run php artisan queue:work
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Evenets\OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {   
        Mail::to($event->user)->send(new OrderShippedMail());
        //Mail::to('umerfayyaz500@gmail.com')->send(new welcomeemail());
    }
}

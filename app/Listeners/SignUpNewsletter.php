<?php

namespace App\Listeners;

use App\Evenets\OrderShipped;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SignUpNewsletter
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
        dump($event->user->email);
    }
}

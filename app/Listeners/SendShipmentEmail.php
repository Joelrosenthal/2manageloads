<?php

namespace App\Listeners;

use App\Events\NewShipment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendShipmentEmail
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
     * @param  NewShipment  $event
     * @return void
     */
    public function handle(NewShipment $event)
    {
        //
    }
}

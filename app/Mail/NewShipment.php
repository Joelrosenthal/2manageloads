<?php

namespace App\Mail;
use App\Shipment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class NewShipment extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Shipment $shipment)
    {
       $this->shipment = $shipment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //->with(['pick_city'=>$this->shipment->pick_city])
        return $this->replyTo('mikec@itransys.com')
        ->subject('REF # ' . $this->shipment->ref_number . ' from ' . $this->shipment->pick_city . ', ' . $this->shipment->pick_state . ' to ' . $this->shipment->delivery_city . ', ' . $this->shipment->delivery_state)
        ->markdown('emails.shipment.newshipment');
    }
}

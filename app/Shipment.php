<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [

    	    'created_by',
            'customer',
            'urgency',
            'load_type',
            'trailer_type',
            'pick_city',
            'pick_state',
            'pick_date',
            'pick_time',
            'actual_pick_date',
            'actual_pick_time',
            'delivery_city',
            'delivery_state',
            'delivery_date',
            'actual_delivery_time',
            'actual_delivery_date',
            'delivery_time',
            'commodity',
            'special_instructions',
            'length',
            'width',
            'height',
            'weight',
            'miles',
            'billing_money',
            'offer_money',
            'post_money',
            'company_contact',
            'contact_phone',
            'user_id',
            'ref_number',
            'po_number'

			];


	public function setPickCityAttribute($value)
    {
        $this->attributes['pick_city'] = strtoupper($value);
    }

    public function setPickStateAttribute($value)
    {
        $this->attributes['pick_state'] = strtoupper($value);
    }

    public function setDeliveryCityAttribute($value)
    {
        $this->attributes['delivery_city'] = strtoupper($value);
    }

    public function setDeliveryStateAttribute($value)
    {
        $this->attributes['delivery_state'] = strtoupper($value);
    }

    public function setCommodityAttribute($value)
    {
        $this->attributes['commodity'] = strtoupper($value);
    }

    public function setSpecialInstructionsAttribute($value)
    {
        $this->attributes['special_instructions'] = strtoupper($value);
    }
}

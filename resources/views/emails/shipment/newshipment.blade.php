@component('mail::message')
# Quote Submission


* Urgency: {{ $shipment->urgency }}
* REF # {{ $shipment->ref_number }}
* Ready Date: {{ $shipment->pick_date . ' ' . $shipment->pick_time }}
* Delivery Date: {{ $shipment->delivery_date . ' ' . $shipment->delivery_time }}
* Load Type: {{ $shipment->load_type }}
* Pick Up: {{ $shipment->pick_city . ', ' . $shipment->pick_state . ' ' . $shipment->pick_store_search }}
* Delivery: {{ $shipment->delivery_city . ', ' . $shipment->delivery_state . ' ' . $shipment->delivery_store_search }}
* Commodity: {{ $shipment->commodity }}
* Overall Dimensions: {{ $shipment->length . 'ft. X ' . $shipment->width . 'ft. X ' . $shipment->height . ' ' . $shipment->weight . 'lbs.' }}
* Special Instructions: {{ $shipment->special_instructions }}


Thank You,<br>
{{ config('app.name') }}
@endcomponent

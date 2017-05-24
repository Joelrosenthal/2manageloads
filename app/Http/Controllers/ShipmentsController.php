<?php

namespace App\Http\Controllers;

use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;
use Illuminate\Http\Request;
use App\Shipment;
use Mail;
use App\Mail\NewShipment;
use Auth;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        JavaScript::put([
        'data' => \App\Shipment::all()
        ]);

        return view('shipment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/Chicago");
        
        // $this->validate($request, [

            
        //     'urgency' => 'required',
        //     'load_type' => 'required',
        //     'pick_city' => 'required',
        //     'pick_state' => 'required',
        //     'pick_date' => 'required',
        //     'pick_time' => 'required',
        //     'delivery_city' => 'required',
        //     'delivery_state' => 'required',
        //     'delivery_date' => 'required',
        //     'delivery_time' => 'required',
        //     'commodity' => 'required',
        //     'special_instructions' => 'required',
        //     'length' => 'required',
        //     'width' => 'required',
        //     'height' => 'required',
        //     'weight' => 'required',


        // ]);

        $shipment = New Shipment($request->all());

        $shipment->save();

        Mail::to(Auth::user()->email)->queue(new NewShipment($shipment));

        return back()->with('status', 'New Load Posted!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Shipment::findOrFail($id);

         return view('edit', compact('post', $post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function newMail()
    // {
    //     $shipment = Shipment::findOrFail(5);

    //     Mail::to(Auth::user()->email)->queue(new NewShipment($shipment));
    // }
}

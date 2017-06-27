<?php

namespace App\Http\Controllers;

use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;
use Illuminate\Http\Request;
use App\Shipment;
use Mail;
use App\Mail\NewShipment;
use Auth;
use Excel;
use Input;

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

        $dontShowActualDates = true;

        return view('shipment')->with('dontShow', $dontShowActualDates);
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
        
        $this->validate($request, [

            
            'urgency' => 'required',
            'load_type' => 'required',
            'pick_city' => 'required',
            'pick_state' => 'required',
            'pick_date' => 'required',
            'pick_time' => 'required',
            'delivery_city' => 'required',
            'delivery_state' => 'required',
            'delivery_date' => 'required',
            'delivery_time' => 'required',
            'commodity' => 'required',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'weight' => 'required',


        ]);

        $shipment = New Shipment($request->all());

        $shipment->company_contact = Auth::user()->name;
        $shipment->customer = Auth::user()->email;
        $shipment->created_by = Auth::user()->email;
        $shipment->user_id = Auth::user()->id;
        $shipment->contact_phone = Auth::user()->cell_phone;

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


         JavaScript::put([
            'post' => $post,
            'data' => \App\Shipment::all()
            ]);

         $dontShowActualDates = false;

         return view('edit', compact('post', $post))->with('dontShow', $dontShowActualDates);
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
         
     date_default_timezone_set("America/Chicago");
        
        $this->validate($request, [

            'urgency' => 'required',
            // 'load_type' => 'required',
            // 'pick_city' => 'required',
            // 'pick_state' => 'required',
            // 'pick_date' => 'required',
            // 'pick_time' => 'required',
            // 'delivery_city' => 'required',
            // 'delivery_state' => 'required',
            // 'delivery_date' => 'required',
            // 'delivery_time' => 'required',
            // 'commodity' => 'required',
            // 'length' => 'required',
            // 'width' => 'required',
            // 'height' => 'required',
            // 'weight' => 'required',            
              
        ]);

        $post = Shipment::findOrFail($id);

        $post->update($request->all());

       Mail::to(Auth::user()->email)->queue(new NewShipment($post));

        return redirect()->route('shipment.index');
    
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

    public function report()
    {
        return view('report');
    }

    public function getReport($type, Request $request){
      
         $start_date = $request->input('start_date');
         $end_date = $request->input('end_date');

         //dd($start_date, $end_date);

        //$data = Item::get()->toArray();
        $shipment = Shipment::select('id', 'ref_number', 'po_number', 'pick_city', 'pick_state','pick_date', 'pick_time', 'actual_pick_date', 'actual_pick_time','delivery_city', 'delivery_state','delivery_date', 'delivery_time', 'actual_delivery_date', 'actual_delivery_time', 'commodity', 'special_instructions', 'length','width','height','weight','miles')->whereBetween('delivery_date', [$start_date, $end_date])->orderBy('id', 'asc')->get();

        return \Excel::create('Profit_Report_' . $start_date . '_to_' . $end_date, function($excel) use ($shipment) {
            $excel->sheet('mySheet', function($sheet) use ($shipment)
            {
                $sheet->fromArray($shipment);
            });
        })->download($type);
    
    }
}

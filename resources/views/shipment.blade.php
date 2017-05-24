@extends('layouts.app')

@section('content')



<div class="container">
<div class="well">
    @include('partials.errors')

    <div id="google_map"></div>

            {!! Form::open(['route' => 'shipment.store']) !!}
                @include('partials.shipment', ['submitButtonText' => 'New Shipment!'])
            {!! Form::close() !!}

</div>
</div>
<shipmentstable></shipmentstable>



@endsection

@include('footer')
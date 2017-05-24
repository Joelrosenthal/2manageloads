@extends('layouts.app')

@section('content')

<div class="container">
    @include('partials.errors')

    <div id="google_map"></div>

            {!! Form::model($post, ['route' => ['shipment.update', $post->id], 'method' => 'PUT']) !!}
                @include('partials.shipment', ['submitButtonText' => 'Update Shipment!'])
            {!! Form::close() !!}

</div>

<shipments></shipments>

@endsection

@include('footer')
@extends('layouts.app')

@section('content')

<div class="container">
<div class="well">
    @include('partials.errors')

    

            {!! Form::model($post, ['route' => ['shipment.update', $post->id], 'method' => 'PUT']) !!}
                @include('partials.shipment', ['submitButtonText' => 'Update Shipment!'])
            {!! Form::close() !!}

</div>
</div>
<shipments></shipments>

@endsection

@include('footer')
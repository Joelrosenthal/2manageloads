@extends('layouts.app')

@section('content')




<div class="container">

<div class="well">
    @include('partials.errors')

    

            {!! Form::open(['route' => 'shipment.store']) !!}
                @include('partials.shipment', ['submitButtonText' => 'New Quote!'])
            {!! Form::close() !!}

            <!-- {!! Html::linkRoute('shipment.edit', 'Edit', array(56), ['class' => 'btn btn-success btn-block']) !!} -->

</div>
</div>
<shipmentstable></shipmentstable>



@endsection

@include('footer')
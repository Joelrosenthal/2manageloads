@extends('layouts.app')

@section('content')
<div class="container-fluid">
<form role="form" class="form-horizontal" method="POST" action="/report/csv">

        {{ csrf_field() }}



        <div class="well">
            <div class="form-group">
                <div class="row">
                <div class="col-md-6">
                    <label class="label-control" for="start_date">Start Date</label>
                    <input type="text" class="form-control daterangestart" name="start_date">
                </div>
                <div class="col-md-6">
                    <label class="label-control" for="end_date">End Date</label>
                    <input type="text" class="form-control daterangeend" name="end_date">
                </div>
                    
                </div>

                <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>

            </div>
        </div>
    
</form>
</div>
@endsection
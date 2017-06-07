<h3>CREATE SHIPMENT <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></h3>
<div class="row">
	<div class="col-md-4">
		{{ Form::label('pick_zip', 'Search by Pick Zip', ['class' => 'label-control']) }}
		{{ Form::text('pick_zip', null, ['class' => 'form-control', 'placeholder' => 'search by pick zip...']) }}
	</div>
	<div class="col-md-4">
		{{ Form::label('delivery_zip', 'Search by Delivery Zip', ['class' => 'label-control']) }}
		{{ Form::text('delivery_zip', null, ['class' => 'form-control', 'placeholder' => 'search by delivery zip...']) }}
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		{{ Form::label('ref_number', 'Reference #', ['class' => 'label-control']) }}
		{{ Form::text('ref_number', null, ['class' => 'form-control']) }}
	</div>
	<div class="col-md-4">
		{{ Form::label('urgency', 'Urgency', ['class' => 'label-control']) }}
		{{ Form::select('urgency', ['Quote' => 'Quote', 'Has Time' => 'Has Time', 'Hot' => 'Hot', 'Screaming' => 'Screaming'], null, ['placeholder' => 'Pick an urgency...', 'class' => 'form-control']) }}
	</div>
	<div class="col-md-4">
		{{ Form::label('load_type', 'Full or Partial', ['class' => 'label-control']) }}
		{{ Form::select('load_type', ['FULL' => 'FULL', 'PARTIAL' => 'PARTIAL'], null, ['placeholder' => 'Choose Full or Partial...', 'class' => 'form-control']) }}
	</div>
</div>

<pickcomponent></pickcomponent>

<div class="row">
	<div class="col-md-4">
		{{ Form::label('delivery_city', 'Delivery City', ['class' => 'label-control']) }}
		{{ Form::text('delivery_city', null, ['class' => 'form-control']) }}
	</div>
	<div class="col-md-4">
		<div class="input-group">
			{{ Form::label('delivery_state', 'Delivery State', ['class' => 'label-control']) }}
			{{ Form::text('delivery_state', null, ['class' => 'form-control']) }}
				<span class="input-group-btn">
					<button id="google_map_btn" class="btn btn-default btn-success" type="button">MAP!</button>
      			</span>
      	</div>
	</div>
	<div class="col-md-4">
		
			{{ Form::label('delivery_store_search', 'Search for Delivery Store', ['class' => 'label-control']) }}
			<deliverysearch></deliverysearch>
			<!-- {{ Form::text('delivery_store_search', null, ['class' => 'form-control', 'placeholder' => 'search by delivery store number, address, phone, etc.......'] ) }} -->
				
	</div>
</div>

<hr>

<h3>FREIGHT</h3>

<div class="row">
	<div class="col-md-6">
		
		{{ Form::label('commodity', 'Commodity', ['class' => 'label-control']) }}
		<commoditysearch></commoditysearch>
		<!-- {{ Form::text('commodity', null, ['class' => 'form-control', 'placeholder' => 'Make and Model is Recommended']) }} -->
	</div>
	<div class="col-md-6">
		{{ Form::label('special_instructions', 'Special Instructions', ['class' => 'label-control']) }}
		{{ Form::text('special_instructions', null, ['class' => 'form-control', 'placeholder' => 'Here you can add more stops, loading capabilities, etc...']) }}
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		{{ Form::label('length', 'Length in feet', ['class' => 'label-control']) }}
		{{ Form::text('length', null, ['class' => 'form-control']) }}
	</div>
	<div class="col-md-3">
		{{ Form::label('width', 'Width in feet', ['class' => 'label-control']) }}
		{{ Form::text('width', null, ['class' => 'form-control']) }}
	</div>
	<div class="col-md-3">
		{{ Form::label('height', 'Height in feet', ['class' => 'label-control']) }}
		{{ Form::text('height', null, ['class' => 'form-control']) }}
	</div>
	<div class="col-md-3">
		{{ Form::label('weight', 'Weight in pounds', ['class' => 'label-control']) }}
		{{ Form::text('weight', null, ['class' => 'form-control']) }}
	</div>
</div>

<hr>
<h3>SCHEDULE <span class="glyphicon glyphicon-time" aria-hidden="true"></span></h3>

<div class="row">
	<div class="col-md-3">
		{{ Form::label('pick_date', 'Planned Pick Date', ['class' => 'label-control']) }}
		{{ Form::text('pick_date', null, ['class' => 'form-control plannedpicker']) }}
	</div>
	<div class="col-md-3">
		{{ Form::label('pick_time', 'Planned Pick Time', ['class' => 'label-control']) }}
		{{ Form::select('pick_time', 
		['0500' => '0500','0600' => '0600','0700' => '0700','0800' => '0800','0900' => '0900','1000' => '1000','1100' => '1100','1200' => '1200','1300' => '1300','1400' => '1400','1500' => '1500','1600' => '1600','1700' => '1700','1800' => '1800','1900' => '1900','2000' => '2000','2100' => '2100','2200' => '2200','2300' => '2300','0100' => '0100','0200' => '0200','0300' => '0300','0400' => '0400'], null, ['placeholder' => 'Choose a pick time...', 'class' => 'form-control']) }}
	</div>
	<div class="col-md-3">
		{{ Form::label('actual_pick_date', 'Actual Pick Date', ['class' => 'label-control']) }}
		{{ Form::text('actual_pick_date', null, ['class' => 'form-control actualpicker']) }}
	</div>
	<div class="col-md-3">
		{{ Form::label('actual_pick_time', 'Actual Pick Time', ['class' => 'label-control']) }}
		{{ Form::select('actual_pick_time', 
		['0500' => '0500','0600' => '0600','0700' => '0700','0800' => '0800','0900' => '0900','1000' => '1000','1100' => '1100','1200' => '1200','1300' => '1300','1400' => '1400','1500' => '1500','1600' => '1600','1700' => '1700','1800' => '1800','1900' => '1900','2000' => '2000','2100' => '2100','2200' => '2200','2300' => '2300','0100' => '0100','0200' => '0200','0300' => '0300','0400' => '0400'], null, ['placeholder' => 'Choose actual pick time...', 'class' => 'form-control']) }}
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		{{ Form::label('delivery_date', 'Planned Delivery Date', ['class' => 'label-control']) }}
		{{ Form::text('delivery_date', null, ['class' => 'form-control planneddeliverypicker']) }}
	</div>
	<div class="col-md-3">
		{{ Form::label('delivery_time', 'Planned Delivery Time', ['class' => 'label-control']) }}
		{{ Form::select('delivery_time', 
		['0500' => '0500','0600' => '0600','0700' => '0700','0800' => '0800','0900' => '0900','1000' => '1000','1100' => '1100','1200' => '1200','1300' => '1300','1400' => '1400','1500' => '1500','1600' => '1600','1700' => '1700','1800' => '1800','1900' => '1900','2000' => '2000','2100' => '2100','2200' => '2200','2300' => '2300','0100' => '0100','0200' => '0200','0300' => '0300','0400' => '0400'], null, ['placeholder' => 'Choose a delivery time...', 'class' => 'form-control']) }}
	</div>
	<div class="col-md-3">
		{{ Form::label('actual_delivery_date', 'Actual Delivery Date', ['class' => 'label-control']) }}
		{{ Form::text('actual_delivery_date', null, ['class' => 'form-control actualdeliverypicker']) }}
	</div>
	<div class="col-md-3">
		{{ Form::label('actual_delivery_time', 'Actual Delivery Time', ['class' => 'label-control']) }}
		{{ Form::select('actual_delivery_time', 
		['0500' => '0500','0600' => '0600','0700' => '0700','0800' => '0800','0900' => '0900','1000' => '1000','1100' => '1100','1200' => '1200','1300' => '1300','1400' => '1400','1500' => '1500','1600' => '1600','1700' => '1700','1800' => '1800','1900' => '1900','2000' => '2000','2100' => '2100','2200' => '2200','2300' => '2300','0100' => '0100','0200' => '0200','0300' => '0300','0400' => '0400'], null, ['placeholder' => 'Choose actual delivery time...', 'class' => 'form-control']) }}
	</div>
</div>


{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'id' => 'new_shipment_btn']) }}
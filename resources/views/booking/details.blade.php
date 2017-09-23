@extends('layouts.client')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">New Booking</h1>
			</div>
			<div class="panel-body">
			@if(isset($booking))
				<div class="col-xs-4 col-xs-offset-4">
					<form action="{{action('BookingController@update', $booking->id)}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input name="_method" type="hidden" value="PATCH">
						<div class="form-group">
							<label for="clientName">Client Name</label>
							<input type="text" class="form-control" name="clientName" value="{{ $booking->client->name }} {{ $booking->client->surname }}">
						</div>

			            <div class="form-group">
			            	<label for="product">Product</label>
			            	<select class="form-control" name="product">
                            <option value="{{ $booking->product }}">Selection - {{ $booking->product }}</option>
                            <optgroup label="Sessions">
                              <option value="Bars">Bars</option>
                              <option value="Body Process">Body Process</option>
                            </optgroup>
                            <optgroup label="Classes">
                              <option value="Classe de Bars">Classes Bars</option>
                              <option value="Classes Fondations">Classes Fondations</option>
                            </optgroup>
                          </select>
			            </div>

			            <div class="form-group">
			                <label>Date</label>
			                <div class='input-group date' id='datetimepicker'>
			                    <input type='text' class="form-control" name="date" value="{{ date_format(date_create($booking->date),'Y-m-d h:i') }}" placeholder="{{ date_format(date_create($booking->date),'d/m/Y h:i A') }}" />
			                    
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>

			            <button class="btn btn-primary btn-block" type="submit">Enregister</button>
					</form>
				</div>
			@else
				<p>No booking</p>
			@endif
			</div>
		</div>
	</div>
	<span id="availabilities" class="hidden">{{ $JSONavailabilities }}</span>
@stop

@section('scripts')
	<script type="text/javascript">
		//Get availabilities in json
		var json = $('#availabilities').html();
		var availabilities = JSON.parse(json);
		var disabled = [];
		for (var i = availabilities.length - 1; i >= 0; i--) {
			if(availabilities.motiv == 'unavailable'){
				disabled.push(availabilities[i].availaDate);
			}
		}

        $(function () {
            $('#datetimepicker').datetimepicker({
            	disabledDates: disabled,
            });
        });
    </script>
@stop
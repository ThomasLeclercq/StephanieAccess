@extends('layouts.app')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Nouvelle réservation</h1>
			</div>
			<div class="panel-body">
			@if(isset($booking))
				<div class="col-xs-4 col-xs-offset-4">
					<form action="{{action('BookingController@update', $booking->id)}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input name="_method" type="hidden" value="PATCH">
						<div class="form-group">
							<label for="clientName">Nom complet du client</label>
							<input type="text" class="form-control" name="clientName" value="{{ $booking->client->name }} {{ $booking->client->surname }}">
						</div>

			            <div class="form-group">
			            	<label for="product">Produit désiré</label>
			            	<select class="form-control" name="product">
                            <option value="{{ $booking->product }}">Selection - {{ $booking->product }}</option>
                            @if(isset($categories))
	                            @foreach($categories as $category)
	                            	<optgroup label="{{ $category->name }}"></optgroup>
	                            	@foreach($category->products as $product)
	                            	<option value="{{ $product->name }}">{{ $product->name }}</option>
	                            	@endforeach
	                            @endforeach
                            @else
                            	<option>Pas de catégories encore crées</option>
                            @endif
                          </select>
			            </div>

			            <div class="form-group">
			                <label>Date et heure</label>
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
				<p>Pas de réservations</p>
			@endif
			</div>
		</div>
	</div>
	@if(isset($JSONavailabilities))
		<span id="availabilities" class="hidden">{{ $JSONavailabilities }}</span>
	@endif
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
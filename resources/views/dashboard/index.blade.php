@extends('layouts.dashboard')
@section('content')
<div class="container panel-container">	
	<div id="calendar"></div>
	<div>
		<button id="save" class="btn btn-primary">Save</button>
		<div>
			<button id="allButWeekEnds" class="btn btn-info pull-right">Available all the time but week-end</button>
		</div>
	</div>
	<form id="saveDates" action="/availabilities" method="POST">
		{{ csrf_field() }}
		<div id="inputs" class="form-group">
			
		</div>
	</form>
</div>
<!-- Availabilities Values -->
<div class="hidden">
	<!-- Availabilities -->
	<span id="availabilities">{{ $jsonAvailabilities }}</span>
	<!-- Bookings -->
	@foreach($bookings as $booking)
	<div class="bookings">
		<span class="bookingId">{{ $booking->id }}</span>
		<span class="bookingClient">{{ $booking->client->name }} {{ $booking->client->surname }}</span>
		<span class="bookingDate">{{ $booking->date }}</span>
		<span class="bookingProduct">{{ $booking->product }}</span>
	</div>
	@endforeach
</div>
@stop

@extends('layouts.dashboard')
@section('content')
<div class="container panel-container">	
	<div id="calendar"></div>
	<div>
		<button id="save" class="btn btn-primary">Save</button>
		<button id="create" class="btn btn-default">Create</button>
		<button id="saveBookings" class="btn btn-success">Save Bookings</button>
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
		@if($booking->date === null)
			<span class="bookingDate"></span>
		@else
			<span class="bookingDate">{{ $booking->date }}</span>
		@endif
		<span class="bookingProduct">{{ $booking->product }}</span>
	</div>
	@endforeach

	<form id="bookingForm" action="/bookings" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PATCH">
		@foreach($bookings as $booking)
		<input class="booking {{ $booking->id }}" type="hidden" name="date" value="{{ $booking->date }}">
		<input class="booking {{ $booking->id }}" type="hidden" name="client" value="{{ $booking->client->name }} {{ $booking->client->surname }}">
		<input class="booking {{ $booking->id }}" type="hidden" name="product" value="{{ $booking->product }}">
		@endforeach
	</form>
</div>
@stop

@extends('layouts.dashboard')
@section('content')
<div class="container panel-container">	
	<div id="calendar"></div>
	<div>
		<button id="save" class="btn btn-primary">Save</button>
	</div>
	<form id="saveDates" action="/availabilities" method="POST">
		{{ csrf_field() }}
		<div id="inputs" class="form-group">
			
		</div>
	</form>
</div>
<!-- Availabilities Values -->
<div class="hidden">
	<span id="availabilities">{{ $jsonAvailabilities }}</span>
</div>
@stop

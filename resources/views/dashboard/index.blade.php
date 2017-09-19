@extends('layouts.dashboard')
@section('content')
<div class="container panel-container">	
	<div id="calendar"></div>
	<div>
		<button id="save" class="btn btn-primary">Save</button>
	</div>
	<form id="saveDates" action="/availabilities" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PATCH">
		<div id="inputs" class="form-group">
			
		</div>
	</form>
</div>
<!-- Availabilities Values -->
<div class="hidden">
	@foreach($availabilities as $availability)
		<span class="id">{{ $availability->id }}</span>
		<span class="date">{{ $availability->availaDate }}</span>
		<span class="motiv">{{ $availability->motiv }}</span>
	@endforeach
</div>
@stop

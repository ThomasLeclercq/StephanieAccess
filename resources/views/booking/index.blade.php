@extends('layouts.client')
@section('content')
	<div style="margin-top: 76px">
		<h1>Bookings</h1>
		@if(isset($bookings) && count($bookings) >= 1)
			<table class="table table-condensed table-hover table-striped table-responsive">
				<thead class="thead-inverse">
					<tr>
						<th>Name</th>
						<th>Surname</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Product</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bookings as $booking)
						<tr>
							<td>{{ $booking->client->name }}</td>
							<td>{{ $booking->client->surname }}</td>
							<td>{{ $booking->client->phone }}</td>
							<td>{{ $booking->client->email }}</td>
							<td>{{ $booking->product }}</td>
							<td>{{ date_format(date_create($booking->date), 'd/m/Y g:i A') }}</td>
							<td>
								@if($booking->status == 0)
									<p class="alert-danger">Not Confirmed</p>
								@else
									<p class="alert-success">Confirmed</p>
								@endif
							</td>
							<td>
								<a href="/bookings/{{ $booking->id }}/edit" class="btn btn-info btn-sm">Update</a>
								<button type="button" class="btn btn-danger btn-sm deleteButton" data-toggle="modal" value="{{ $booking->id }}" data-target="#deleteModal">Delete</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>No Bookings</p>
		@endif
	</div>


<!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Warning</h4>
      </div>
      <div class="modal-body">
        <p>
        	You are about to delete a booking for the reservation.
        	<br>
        	This action cannot be undone, please be sure before confirming it's deletion.
        </p>
      </div>
      <div class="modal-footer">
      	<form id="deleteForm" method="POST">
      		{{ csrf_field() }}
      		<input name="_method" type="hidden" value="DELETE">
      		<button type="submit" name="deleteBooking" class="btn btn-danger">Cancel reservation</button>
      	</form>
      </div>
    </div>

  </div>
</div>
@stop

@section('scripts')
	<script type="text/javascript">
		var form = document.getElementById('deleteForm');
		var buttons = document.getElementsByClassName('deleteButton');
		for (var i = buttons.length - 1; i >= 0; i--) {
			buttons[i].addEventListener('click',function(e){
				form.setAttribute('action','/bookings/'+this.value);
			});
		}
	</script>
@stop
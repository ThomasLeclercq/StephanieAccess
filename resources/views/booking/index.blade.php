@extends('layouts.app')
@section('content')
<div class="container panel-container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">{{ isset($pastBookings) ? 'Anciennes ':''}} Réservations</h1>
		</div>
		<div class="panel-body">
		@if(isset($bookings) && count($bookings) >= 1)
		<div style="overflow-x: auto">
			<table class="table table-condensed table-hover table-striped table-responsive">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Téléphone</th>
						<th>E-mail</th>
						<th>Produits</th>
						<th>Date</th>
						<th>Statut</th>
						<th colspan="2">Action</th>
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
									<p class="alert-danger">Pas encore confirmée</p>
								@else
									<p class="alert-success">Confirmée</p>
								@endif
							</td>
							<td>
								<a href="/bookings/{{ $booking->id }}/edit" class="btn btn-info btn-sm">Modifier</a>
							</td>
							<td>
								<button type="button" class="btn btn-danger btn-sm deleteButton" data-toggle="modal" value="{{ $booking->id }}" data-target="#deleteModal">Supprimer</button>
							</td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="7"></td>
						<td colspan="2">
							@if(isset($pastBookings))
								<a href="/bookings" class="btn btn-info btn-block">Réservations</a>
							@else
								<a href="/pastBookings" class="btn btn-info btn-block">Anciennes Résas</a>
							@endif
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
		@else
			<p>Pas de réservations</p>
			@if(isset($pastBookings))
				<a href="/bookings" class="btn btn-info btn-block">Réservations</a>
			@else
				<a href="/pastBookings" class="btn btn-info btn-block">Anciennes Résas</a>
			@endif
		@endif
		</div>
	</div>
</div>

<!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Attention !!!</h4>
      </div>
      <div class="modal-body">
        <p>
        	Vous êtes sur le point de supprimer définitivement une réservation.
        	<br>
        	Cette action ne peut pas être modifiée une fois confirmée, soyez bien sûr que vous souhaitez annuler la réservation avant de cliquer sur "annuler la réservation".
        </p>
      </div>
      <div class="modal-footer">
      	<form id="deleteForm" method="POST">
      		{{ csrf_field() }}
      		<input name="_method" type="hidden" value="DELETE">
      		<button type="submit" name="deleteBooking" class="btn btn-danger">Annuler la réservation</button>
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
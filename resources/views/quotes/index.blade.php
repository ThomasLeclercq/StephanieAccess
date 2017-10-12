@extends('layouts.admin')
@section('content')
<div class="container panel-container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Quotes</h1>
		</div>
		<div class="panel-body">
		@if(isset($quotes) && count($quotes) >= 1)
			<table class="table table-responsive table-hovertable-condensed table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Surname</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Product</th>
						<th>Date</th>
						<th>Contact</th>
						<th>Action</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($quotes as $quote)
					<tr style="text-align:center">	
						<td>{{ $quote->name }}</td>
						<td>{{ $quote->surname }}</td>
						<td>{{ $quote->phone }}</td>
						<td><a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a></td>
						<td>{{ $quote->product }}</td>
						<td>{{ date_format(date_create($quote->created_at),'D d/m/Y à H:i') }}</td>
						<td>
							@if($quote->status == 0)
							<p class="alert-danger">Non</p>
							@else
							<p class="alert-success">Oui</p>
							@endif
						</td>
						<td>
							@if($quote->status == 0)
								<a href="/quotes/contact/{{ $quote->id }}" class="btn btn-info btn-sm btn-block">Contacter</a>
							@else
								<a href="/quotes/transform/{{ $quote->id }}" class="btn btn-primary btn-sm btn-block">Transformer en résa</a>
							@endif
						</td>
						<td>
							<button type="button" class="btn btn-danger btn-sm deleteButton" data-toggle="modal" value="{{ $quote->id }}" data-target="#deleteModal">Delete</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>Pas de nouvelles demandes</p>
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
        	Vous êtes sur le point de supprimer définitivement la demande d'un potentiel client.
        	<br>
        	Cette action ne peut pas être modifiée une fois confirmée, soyez bien sûr que vous souhaitez supprimer la demande avant de cliquer sur "annuler la demande".
        </p>
      </div>
      <div class="modal-footer">
      	<form id="deleteForm" method="POST">
      		{{ csrf_field() }}
      		<input name="_method" type="hidden" value="DELETE">
      		<button type="submit" name="deleteQuotes" class="btn btn-danger">Annuler la demande</button>
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
				form.setAttribute('action','/quotes/'+this.value);
			});
		}
	</script>
@stop
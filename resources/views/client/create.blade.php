@extends('layouts.app')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">{{ isset($client) ? 'Modifier informations du client' : 'Nouveau client' }}</h1>
			</div>
			<div class="panel-body">
				<form action="{{ isset($client) ? '/clients/'.$client->id : '/clients' }}" method="POST">
					{{ csrf_field()  }}
					
					@if(isset($client))
						<input type="hidden" name="_method" value="PATCH">
					@endif

					<div class="form-group">
						<label for="name">Nom</label>
						<input type="text" name="name" value="{{ $client->name or old('name') }}" class="form-control">
					</div>

					<div class="form-group">
						<label for="name">Prénom</label>
						<input type="text" name="surname" value="{{ $client->surname or old('surname') }}" class="form-control">
					</div>

					<div class="form-group">
						<label for="name">Numéro de téléphone</label>
						<input type="text" name="phone" value="{{ $client->phone or old('phone') }}" class="form-control">
					</div>

					<div class="form-group">
						<label for="name">E-mail</label>
						<input type="text" name="email" value="{{ $client->email or old('email') }}" class="form-control">
					</div>

					<div class="panel-footer">
						<button class="btn btn-primary btn-block" type="submit">
							@if(isset($client))
								Modifier
							@else
								Créer
							@endif
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop
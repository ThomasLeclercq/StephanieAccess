@extends('layouts.admin')
@section('content')
<div class="container panel-container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class='panel-title'>Clients</h1>
		</div>
		<div class="panel-body">
		@if(isset($clients) && count($clients) >= 1)
			<table class="table table-responsive table-condensed table-striped table-hover">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Téléphone</th>
						<th>E-mail</th>
						<th>Client depuis :</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($clients as $client)
					<tr>
						<td>{{ $client->name }}</td>
						<td>{{ $client->surname }}</td>
						<td>{{ $client->phone }}</td>
						<td>{{ $client->email }}</td>
						<td>{{ date_format(date_create($client->date_created),'d/m/Y') }}</td>
						<td>
							<a href="/clients/{{ $client->id }}/edit" class="btn btn-info btn-sm">Modifier</a>
							<a href="/clients/archive/{{ $client->id }}" class="btn btn-danger btn-sm">Archiver
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>Pas de clients</p>
		@endif
		</div>
		<div class="panel-footer">
			<a href="/clients/create" class="btn btn-primary">Ajouter nouveau client</a>
		</div>
	</div>
</div>
@stop
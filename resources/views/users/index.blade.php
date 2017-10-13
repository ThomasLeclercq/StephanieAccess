@extends('layouts.app')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Utilisateurs</h1>
			</div>
			<div class="panel-body">
				@if( count($users) >= 1)
				<table class="table table-responsive table-hover table-condensed table-striped">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Email</th>
							<th colspan="2">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<a href="/users/{{ $user->id }}/edit" class="btn btn-info btn-block">Editer</a>
							</td>
							<td>
								<a href="/users/{{ $user->id }}/archive" class="btn btn-danger btn-block">Supprimer</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@else
					<p>Pas d'utilisateurs</p>
				@endif
			</div>
			<div class="panel-footer">
				<a href="/users/create" class="btn btn-primary">Créer nouveau utilisateur</a>
			</div>	
		</div>
	</div>	
@stop
@extends('layouts.app')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Produits</h1>
			</div>
			<div class="panel-body">
				@if( count($products) >= 1)
				<table class="table table-responsive table-hover table-condensed table-striped">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Catégorie</th>
							<th>Prix</th>
							<th>Description</th>
							<th colspan="2">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td>{{ $product->name }}</td>
							<td>{{ $product->category->name }}</td>
							<td>{{ $product->price }}€</td>
							<td>{{ $product->description }}</td>
							<td>
								<a href="/products/{{ $product->id }}/edit" class="btn btn-info btn-block">Editer</a>
							</td>
							<td>
								<a href="/products/{{ $product->id }}/archive" class="btn btn-danger btn-block">Supprimer</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@else
					<p>Pas de Produits</p>
				@endif
			</div>
			<div class="panel-footer">
				<a href="/products/create" class="btn btn-primary">Créer nouveau produit</a>
			</div>	
		</div>
	</div>	
@stop

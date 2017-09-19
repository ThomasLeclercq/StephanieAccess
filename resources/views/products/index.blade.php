@extends('layouts.client')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Products</h1>
			</div>
			<div class="panel-body">
				@if( count($products) >= 1)
				<table class="table table-responsive table-hover table-condensed table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Category</th>
							<th>Price</th>
							<th colspan="2">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td>{{ $product->name }}</td>
							<td>{{ $product->category->name }}</td>
							<td>{{ $product->price }}€</td>
							<td>
								<a href="/products/{{ $product->id }}/edit" class="btn btn-info btn-block">Edit</a>
							</td>
							<td>
								<a href="/products/{{ $product->id }}/archive" class="btn btn-danger btn-block">Remove</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@else
					<p>No Products</p>
				@endif
			</div>
			<div class="panel-footer">
				<a href="/products/create" class="btn btn-primary">Create</a>
			</div>	
		</div>
	</div>	
@stop

@extends('layouts.client')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"></h1>
			</div>
			<div class="panel-body">
				<form action="{{ isset($product) ? '/products/'.$product->id : '/products' }}" method="POST">
					{{ csrf_field()  }}
					
					@if(isset($product))
						<input type="hidden" name="_method" value="PATCH">
					@endif

					<div class="form-group">
						<label for="name">Product Name</label>
						<input type="text" name="name" value="{{ $product->name or old('name') }}" class="form-control">
					</div>

					<div class="form-group">
						<label for="category">Product Category</label>
						<select name="category" class="form-control">
							@if(isset($product))
							<option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
							@else
							<option></option>
							@endif
							@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="price">Product Price</label>
						<input type="number" name="price" value="{{ $product->price or old('price') }}" step="0.01" class="form-control">
					</div>

					<div class="panel-footer">
						<button class="btn btn-primary btn-block" type="submit">
							@if(isset($product))
								Update
							@else
								Create
							@endif
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop
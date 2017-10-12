@extends('layouts.admin')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">{{ isset($product) ? 'Modifier produit':'Créer produit' }}</h1>
			</div>
			<div class="panel-body">
				<form action="{{ isset($product) ? '/products/'.$product->id : '/products' }}" method="POST">
					{{ csrf_field()  }}
					
					@if(isset($product))
						<input type="hidden" name="_method" value="PATCH">
					@endif

					<div class="form-group">
						<label for="name">Nom du produit</label>
						<input type="text" name="name" value="{{ $product->name or old('name') }}" class="form-control">
					</div>

					<div class="form-group">
						<label for="category">Assigner catégorie</label>
						<select name="category" class="form-control">
							@if(isset($product))
							<option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
							@else
							<option value="Pas de catégorie"></option>
							@endif
							<option value="Pas de catégorie"></option>
							@if(isset($categories))
								@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							@else
								<option value="Pas de catégorie">Pas de catégories encore crées</option>
							@endif
						</select>
					</div>

					<div class="form-group">
						<label for="price">Prix</label>
						<input type="number" name="price" value="{{ $product->price or old('price') }}" step="0.01" class="form-control">
					</div>

					<div class="form-group">
						<label for="description">Description</label>
						<textarea name="description" class="form-control">
							{{ $product->description or old('description') }}
						</textarea>
					</div>

					<div class="panel-footer">
						<button class="btn btn-primary btn-block" type="submit">
							@if(isset($product))
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
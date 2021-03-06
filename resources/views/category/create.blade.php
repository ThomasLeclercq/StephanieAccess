@extends('layouts.app')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">{{ isset($category) ? $category->name : 'Nouvelle categorie' }}</h1>
			</div>
			<div class="panel-body">
				<form action="{{ isset($category) ? '/categories/'.$category->id : '/categories' }}" method="POST">
					{{ csrf_field() }}

					@if(isset($category))
					<input type="hidden" name="_method" value="PATCH">
					@endif

					<div class="form-group">
						<label for="name">Nom</label>
						<input type="text" name="name" value="{{ $category->name or old('name') }}" class="form-control">
					</div>

					<button type="submit" class="btn btn-primary btn-block">
						@if(isset($category))
							Modifier
						@else
							Créer
						@endif
					</button>
				</form>
			</div>
		</div>
	</div>
@stop
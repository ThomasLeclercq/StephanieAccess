@extends('layouts.app')
@section('content')
	<div class="container panel-container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Catégories</h1>
			</div>
			<div class="panel-body">
				@if( count($categories) >= 1)
				<table class="table-condensed table-responsive table-striped table-hover">
					<thead>
						<tr>
							<th>Numéro</th>
							<th>Nom</th>
							<th colspan="2">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
							<td>
								<a href="/categories/{{ $category->id }}/edit" class="btn btn-info btn-block">Editer</a>
							</td>
							<td>
								<button type="button" class="btn btn-danger btn-block deleteButton" data-toggle="modal" data-target="#deleteModal" value="{{ $category->id }}">
									Supprimer	
								</button>
							</td>
						</tr>	
						@endforeach
					</tbody>
				</table>
				@else
					<p>Pas de catégories</p>
				@endif
			</div>
			<div class="panel-footer">
				<a href="/categories/create" class="btn btn-primary">Créer nouvelle catégorie</a>
			</div>
		</div>
	</div>
<!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!--Modal Content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Attention !!!</h4>
			</div>
			<div class="modal-body">
				<p>
					Vous êtes sur le point de supprimer une catégorie, attention cette action sera définitive.<br>
					Etes-vous bien sûr de vouloir faire cela ?
				</p>
			</div>
			<div class="modal-footer">
				<form id="deleteForm" method="POST">
			  		{{ csrf_field() }}
			  		<input name="_method" type="hidden" value="DELETE">
			  		<button type="submit" name="deleteCategory" class="btn btn-danger">Supprimer categorie</button>
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
				form.setAttribute('action','/categories/'+this.value);
			});
		}
	</script>
@stop
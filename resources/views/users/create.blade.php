@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">{{ isset($user) ? $user->name : 'Nouvel Utilisateur' }}</h1>
			</div>
			<div class="panel-body">
				<div class="col-sm-6 col-sm-offset-3">
					@if(Session::has('error'))
						<div class="label-warning">
							{{ Session::get('error') }}
						</div>
					@endif
					<form id="userForm" method="POST" action="{{ isset($user) ? '/users/'.$user->id : '/users' }}">
						{{ csrf_field() }}
						
						@if(isset($user))
						<input type="hidden" name="_method" value="PATCH">
						@endif

						<div class="form-group">
							<label for="name">Nom de l'utilisateur</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $user->name or old('name') }}" required>
							@if ($errors->has('name'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('name') }}</strong>
	                            </span>
	                        @endif
						</div>

						<div class="form-group">
							<label for="email">Email de l'utilisateur</label>
							<input type="email" name="email" id="email" class="form-control" value="{{ $user->email or old('email') }}" required>
							@if ($errors->has('email'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('email') }}</strong>
	                            </span>
	                        @endif
						</div>
					
						@if(isset($user) && Auth::user()->id == $user->id)
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h2 class="panel-title">Changer mot de passe</h2>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label for="oldPassword">Ancien mot de passe</label>
									<input type="password" name="oldPassword" id="oldPassword" class="form-control">
									@if ($errors->has('oldPassword'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('oldPassword') }}</strong>
			                            </span>
		                        	@endif
								</div>
								<div class="form-group">
									<label for="newPassword">Nouveau mot de passe</label>
									<input type="password" name="newPassword" id="newPassword" class="form-control">
									@if ($errors->has('newPassword'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('newPassword') }}</strong>
			                            </span>
		                        	@endif
								</div>
							</div>
						</div>
						@endif
					</form>
				</div>
			</div>
			<div class="panel-footer">
				<button class="btn btn-info btn-block" type="submit" form="userForm">{{ isset($user) ? 'Modifier':'Créer' }}</button>
			</div>
		</div>
	</div>
@stop
@extends('layouts.client')
@section('content')
	<div style="margin-top: 76px">
		<h1>Quotes</h1>
		@if(isset($quotes) && count($quotes) >= 1)
			<table class="table table-responsive table-hovertable-condensed table-striped">
				<thead class="thead-inverse">
					<tr>
						<th>Name</th>
						<th>Surname</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Product</th>
						<th>Date</th>
						<th>Contact</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($quotes as $quote)
					<tr style="text-align:center">	
						<td>{{ $quote->name }}</td>
						<td>{{ $quote->surname }}</td>
						<td>{{ $quote->phone }}</td>
						<td><a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a></td>
						<td>{{ $quote->product }}</td>
						<td>{{ date_format(date_create($quote->created_at),'D d/m/Y à H:i') }}</td>
						<td>
							@if($quote->status == 0)
							<p class="alert-danger">Non</p>
							@else
							<p class="alert-success">Oui</p>
							@endif
						</td>
						<td>
							@if($quote->status == 0)
								<a href="/quotes/contact/{{ $quote->id }}" class="btn btn-info btn-sm btn-block">Contacter</a>
							@else
								<a href="/quotes/transform/{{ $quote->id }}" class="btn btn-primary btn-sm btn-block">Transformer en résa</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>No quotes</p>
		@endif
	</div>
@stop
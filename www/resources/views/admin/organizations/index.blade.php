@extends('admin.base')

@section('admin_content')
	<h1>Organizations Admin</h1>
	<p>List of all organizations  <a class="btn btn-primary" href="{{route('organizations.create')}}">New Organization</a></p>

	@if(count($organizations) > 0 )
	<table class='table table-striped'>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Slug</th>
				<th># Users</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($organizations as $organization)
				<tr>
					<td>{{ $organization->id }}</td>
					<td>
						<a href="{{ route('organizations.show', ['organization'=>$organization->id]) }}">
							{{ $organization->name }}
						</a>
					</td>
					<td>{{ $organization->description }}</td>
					<td>{{ $organization->slug }}</td>
					<td>{{ count($organization->users) }}</td>
					<td>
						<form method="delete" action="{{ route('organizations.destroy', ['organization'=>$organization->id]) }}" class="btn-group">
							<div class="btn-group btn-group-sm">
								<a type="button" class="btn btn-warning" href="{{route('organizations.edit', ['organization'=> $organization->id])}}">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<button type="submit" class="btn btn-danger">
									<span class="glyphicon glyphicon-trash"></span>
								</button>	
							</div>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@endif
@endsection
@extends('admin.base')

@section('admin_content')
	<h1>Organizations
	<a class="btn btn-primary" href="{{route('admin.organizations.create')}}">New Organization</a>
	</h1>

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
						<a href="{{ route('admin.organizations.show', ['organization'=>$organization->slug]) }}">
							{{ $organization->name }}
						</a>
					</td>
					<td>{{ $organization->description }}</td>
					<td>{{ $organization->slug }}</td>
					<td><span class="badge">{{ count($organization->users) }}</span></td>
					<td>
						<form method="post" action="{{ route('admin.organizations.destroy', ['organization'=>$organization->slug]) }}" class="btn-group">
							{{ csrf_field() }}
							<div class="btn-group btn-group-sm">
								<a type="button" class="btn btn-warning" href="{{route('admin.organizations.edit', ['organization'=> $organization->slug])}}">
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
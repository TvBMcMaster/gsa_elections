@extends('admin.base')

@section('admin_content')
	<h1>{{ $organization->name}}</h1>
	<small>{{ $organization->slug}}</small>
	<p>{{ $organization->description}}</p>

	@if(count($organization->users) > 0)
		<h4>Org Users</h4>
		<table class='table table-striped'>
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
				</tr>
			</thead>
		
			<tbody>
			@foreach($organization->users as $user)
				<tr>
					<td><a href="{{route('users.show', ['user'=>$user->id])}}">{{$user->name}}</a></td>
					<td>{{$user->email}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@else
		<p>No users assigned to this organization.</p>
	@endif
	<a href="{{route('organizations.index')}}" class="btn btn-default">Back</a>
@endsection
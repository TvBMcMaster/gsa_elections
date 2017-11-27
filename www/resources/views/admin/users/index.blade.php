@extends('admin.base')

@section('admin_content')
	<h1>Users - List</h1>
	<p>List of all users  <a class="btn btn-primary" href="users/create">New User</a></p>
	

	@if(count($users) > 0)
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							<div class="btn-group btn-group-sm">
								<a type="button" class="btn btn-default" href="users/{{$user->id}}">Edit</a>
								<a type="button" class="btn btn-default" href="#">Reset Password</a>
								<a type="button" class="btn btn-default" href="users/delete/{{$user->id}}">Delete</a>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<p>No Users Found!</p>
	@endif
		

@endsection
@extends('admin.base')

@section('admin_content')
	<h1>Users
	<a class="btn btn-primary" href="{{route('users.create')}}">New User</a>
	</h1>

	@if(count($users) > 0)
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Organization</th>
					<th>Role</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td><a href="{{route('users.show', ['user' => $user->id])}}">{{$user->name}}</a></td>
						<td>{{$user->email}}</td>
						<td>
							@if(!is_null($user->organization))
								<a href="{{route('organizations.show', ['organization'=>$user->organization->id])}}">
									{{$user->organization->name}}
								</a>
							@endif
						</td>
						<td>	
							<span class="badge">{{ strtoupper($user->role->slug)}}</span>
						</td>
						<td>
							<div class="btn-group btn-group-sm">
            					<a type="button" class="btn btn-warning" href="{{route('users.edit', ['user'=>$user->id])}}">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
        						<a class="btn btn-danger" href="#">
        							<span class="glyphicon glyphicon-trash"></span>
        						</a>
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
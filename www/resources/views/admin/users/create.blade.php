@extends('admin.base')

@section('admin_content')
<div class="container">
	<h1>New User</h1>
	<p>Create a new user</p>
	<form method="post" action="{{route('admin.users.store')}}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name:</label>
			<input class="form-control" name="name" id="name">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" name="email" id="email">
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" name="password" id="password">
		</div>
		<div class="form-group">
			<label for="organization">Organization</label>
			<select class="form-control" name="organization">
				<option value=-1>(None)</option>
				@foreach($organizations as $organization)
					<option value={{$organization->id}}>{{$organization->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="role">Role</label>
			<select class="form-control" name="role">
				@foreach($roles as $role)
					<option value={{$role->id}}>{{$role->name}}</option>
				@endforeach
			</select>
		</div>
		<button type='submit' class="btn btn-default">Submit</button>
		<a href="{{route('admin.users.index')}}" class="btn btn-default">Back</a>
	</form>
</div>
@endsection
@extends('admin.base')

@section('admin_content')
	<h1>Edit User</h1>
	<a type="button" href="/admin/users" class="btn btn-warning">All Users</a>
	<form method="POST" action="{{route('admin.users.update', ['user'=>$user->id])}}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" class="form-control" value="{{$user->name}}">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" class="form-control" value="{{$user->email}}">
		</div>
		<div class="form-group">
			<label for="organization">Organization</label>
			<select class="form-control" name="organization">  
				<option value=-1>(None)</option>
				@foreach($organizations as $organization)
					<option value={{$organization->id}} @if($user->organization_id == $organization->id) selected="selected"@endif>{{$organization->name}}</option>
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-default">Update</button>
		<a href="{{route('admin.users.index')}}" class="btn btn-default">Back</a>
	</form>
@endsection
@extends('admin.base')

@section('admin_content')
	<h1>Edit User</h1>
	<a type="button" href="/admin/users" class="btn btn-warning">All Users</a>
	<form method="POST" action="/admin/users/{{$user->id}}">
		<input name="_method" type="hidden" value="PUT">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" class="form-control" value="{{$user->name}}">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" class="form-control" value="{{$user->email}}">
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection
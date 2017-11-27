@extends('admin.base')

@section('admin_content')
	<h1>New User</h1>
	<p>Create a new user</p>
	<form method="post" action="/admin/users">
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
		<button type='submit' class="btn btn-default">Submit</button>
	</form>
@endsection
@extends('admin.base')

@section('admin_content')
	<h1>New Organization</h1>
	<p>Create a new organization</p>
	<form method="post" action="{{ route('admin.organizations.store') }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name:</label>
			<input class="form-control" name="name" id="name">
		</div>
		<div class="form-group">
			<label for="description">Description:</label>
			<input type="text" class="form-control" name="description" id="description">
		</div>
		<div class="form-group">
			<label for="slug">Slug:</label>
			<input type="slug" class="form-control" name="slug" id="slug">
		</div>
		<button type='submit' class="btn btn-default">Submit</button>
		<a href="{{route('admin.organizations.index')}}" class="btn btn-default">Back</a>
	</form>
@endsection
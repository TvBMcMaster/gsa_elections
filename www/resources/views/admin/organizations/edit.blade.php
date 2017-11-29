@extends('admin.base')

@section('admin_content')
	<h1>Edit Organization</h1>
	<form method="POST" action="{{route('organizations.update', ['organization'=>$organization->slug])}}" class="form">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" class="form-control" value="{{$organization->name}}">
		</div>
		<div class="form-group">
			<label for="slug">Slug:</label>
			<input type="text" name="slug" class="form-control" value="{{$organization->slug}}">
		</div>
		<div class="form-group">
			<label for="description">Description:</label>
			<input type="text" name="description" class="form-control" value="{{$organization->description}}">
		</div>
		<button type="submit" class="btn btn-default">Update</button>
		<a href="{{route('organizations.index')}}" class="btn btn-default">Back</a>
	</form>
@endsection
@extends('layout.app')

@section('title', {{ $organization->name }})

@section('navbar')
	@include('includes.navbar')
@endsection

@section('content')
<div class="container">
	<h1>{{ $organization->name }}</h1>
	<p>{{ $organization->description }}</p>

	<div class='admin-box form-inline'>
		<a class="btn" href="{{ route('organizations.users', $organization)}}">Users</a>
	</div>

</div>
@endsection
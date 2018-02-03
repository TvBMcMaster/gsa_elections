@extends('layouts.app')

@section('title', $organization->name )

@section('content')

<h1>{{ $organization->name }}</h1>
<p>{{ $organization->description }}</p>

<div class='admin-box form-inline'>
	<a class="btn" href="{{ route('organizations.users', $organization->slug)}}">Users</a>
</div>


@endsection
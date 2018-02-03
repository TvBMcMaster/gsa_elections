@extends('layouts.app')

@section('title', $organization->name.' Users')

@section('content')
<h1>Users</h1>
<h2>Back to <a href="/{{$organization->slug}}">{{$organization->name}}</a></h2>
<table class='table table-striped'>
<thead>
	<tr>
		<th>Name</th>
		<th>Email</th>
	</tr>
</thead>

<tbody>
@foreach($organization->users as $user)
	<tr>
		<td>{{$user->name}}</a></td>
		<td>{{$user->email}}</td>
	</tr>
@endforeach
</tbody>
</table>
@endsection
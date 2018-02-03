@extends('admin.base')

@section('admin_content')
	<h1>{{$user->name}}</h1>
	<p>{{$user->email}}</p>
	@if(!is_null($user->organization))
	<p><a href="{{route('admin.organizations.show', ['organization'=>$user->organization_id])}}">{{$user->organization->name}}</a></p>
	@else
	<p>Unaffiliated to an organization</p>
	@endif
	<a href="{{route('admin.users.index')}}" class="btn btn-default">Back</a>
@endsection
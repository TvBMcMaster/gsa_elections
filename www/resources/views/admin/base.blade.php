@extends('layouts.base')

@section('content')
  @include('admin.includes.navbar')
  <div class="container">
  	@yield('admin_content')
  </div>
@endsection
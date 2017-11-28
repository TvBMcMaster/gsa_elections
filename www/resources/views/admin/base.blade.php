@extends('layouts.app')

@section('navbar')
  @include('admin.includes.navbar')
@endsection

@section('content')
<div class="container">
  @yield('admin_content')
</div>
@endsection
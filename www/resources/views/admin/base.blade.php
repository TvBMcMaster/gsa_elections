@extends('layouts.app')

@section('navbar')
  @include('admin.includes.navbar')
@endsection

@section('content')

  @yield('admin_content')

@endsection
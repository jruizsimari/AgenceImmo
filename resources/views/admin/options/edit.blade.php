@extends('admin.admin')

@section('title', 'Modifier une option')

@section('content')
    <h1>@yield('title')</h1>
    @include('admin.options.form')
@endsection

@extends('admin.admin')

@section('title', 'Editer la propriété')

@section('content')
    <h1>@yield('title')</h1>
    @include('admin.properties.form')
@endsection

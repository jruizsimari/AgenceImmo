@extends('admin.base')

@section('title', 'Créer un Option')

@section('content')
    <h1>@yield('title')</h1>
    @include('admin.options.form')
@endsection

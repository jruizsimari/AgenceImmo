@extends('admin.admin')

@section('title', "Créer un bien")

@section('content')
    <h1>@yield('title')</h1>
    @include('admin.properties.form')
@endsection


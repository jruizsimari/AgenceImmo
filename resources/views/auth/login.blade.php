@extends('front.base')

@section('title', 'Se connecter')

@section('content')
<div class="mt-4 container">
    <h1>@yield('title')</h1>
    @include('shared.flash')
    <form class="vstack gap-3" action="{{ route('login') }}" method="post">
        @csrf
        @include('shared.input', ['name' => 'email', 'type' => 'email'])
        @include('shared.input', ['name' => 'password', 'type' => 'password', 'label' => 'Mot de passe'])
        <div>
            <button class="btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>
@endsection

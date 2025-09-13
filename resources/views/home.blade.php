@extends('front.base')

@section('title', 'Page d\'accueil')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Marrakech</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur assumenda, consectetur corporis dolor dolorem eaque error eveniet labore, laborum nihil nulla quae quas quidem quo rerum sequi tenetur, ullam unde!</p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach($properties as $property)
                <div class="col">
                    @include('front.property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection

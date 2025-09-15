<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
</head>
</head>
<body>
    <div class="container mt-5">
        @php
            $route_name = request()->route()->getName();
        @endphp
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Agence Marrakech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a @class(['active' => str_contains($route_name, '.property'), 'nav-link']) href="{{ route('admin.property.index') }}">Gérer les Biens</a>
                        <a @class(['active' => str_contains($route_name, '.option'), 'nav-link']) href="{{ route('admin.option.index') }}">Gérer les Options</a>
                    </div>
                </div>
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">

                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="nav-link">Se déconnecter</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @include('shared.flash')

        @yield('content')
    </div>
</body>
</html>

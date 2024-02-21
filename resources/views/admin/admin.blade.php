@php
$route = request()->route()->getName();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Administration</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tom-select.css') }}">
    <script src="{{ asset('tom-select.min.js') }}"></script>
    <style>
        @layer reset {
            button {
                all: unset;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{ route('admin.property.index') }}" @class(['nav-link', 'active'=> str_contains($route, 'property.')])>Gérer les biens</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.option.index') }}" @class(["nav-link", "active"=> str_contains($route, 'option.')])>Gérer les options</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="nav-link">Se déconnecter</button>
                        </form>
                    </li>
                    @endauth


            </div>
        </div>
    </nav>
    <div class="container">
        @include('shared.flash')
        @yield('content')
    </div>
    <script>
        new TomSelect('select[multiple]', {
            plugins: {
                remove_button: {
                    title: 'suprimer'
                }
            }
        })
    </script>
</body>

</html>
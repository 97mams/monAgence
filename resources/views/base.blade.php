@php
$route = request()->route()->getName();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Mon agence</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <style>
        @layer demo {
            bottom {
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
                        <a href="{{ route('property.index') }}" @class(['nav-link', 'active'=> str_contains($route, 'property.')])>Biens</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" @class(["nav-link"])>Gérer les options</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
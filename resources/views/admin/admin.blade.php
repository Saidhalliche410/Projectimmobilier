
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Administration</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary nav-bar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('saido')}}">Agence</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php

            $route=request()->route()->getName();
        @endphp
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="{{route('admin.property.index')}}" @class(['nav-link','active' => str_contains($route,'property.')])>Géere les biens</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.options.index')}}" @class(['nav-link','active' => str_contains($route,'options.')])>Géere les options</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">

    @include('shared.said')
    @yield('content')
</div>
<script>
    new TomSelect('select[multiple]',{plugins:{remove_button:{title:'Supprimer'}}})
</script>
</body>
</html>

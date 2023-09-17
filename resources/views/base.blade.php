
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

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
                    <a href="{{route('said.index')}}" @class(['nav-link','active' => str_contains($route,'property.')])>Biens</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.options.index')}}" @class(['nav-link','active' => str_contains($route,'options.')])>Gérer les options</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




    @yield('content')


</body>
</html>

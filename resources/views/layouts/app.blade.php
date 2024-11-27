<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="La Galemba - Your go-to place for fresh produce">
    <title>La Galemba @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/catalogo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            overflow-x: hidden;
            /* Oculta el desbordamiento horizontal */
        }

        .navbar {
            background-color: #2ac52f;
            width: 100%;
            height: 190px;
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
        }

        .container-fluid {
            padding: 0 20px;
            margin: 0;
            width: 100%;
            box-sizing: border-box;
        }

        .navbar .nav-item .nav-link {
            font-size: 30px;
            font-weight: bolder;
            color: #bc2e07;
            font-family: system-ui;
        }

        .navbar .nav-item .nav-link:hover {
            color: #f5e42e;
            text-decoration: underline;
        }

        .d-flex .form-control {
            width: 300px;
            font-size: 20px;
        }

        .d-flex .btn-warning {
            font-size: 20px;
            padding: 9px 28px;
        }

        .navbar-brand img {
            height: 150px;
            padding: 15px;
            max-width: 100%;
            box-sizing: border-box;
            margin-top: 18%;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('imagenes/LOGO FRUVER.png') }}" alt="Logo Fruver"
                    style="height: 158px; padding: 0px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carrito.index') }}">Mi carrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Mi cuenta</a>
                    </li>
                    @auth

                        <!-- Botón de Cerrar Sesión -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link"
                                    style="display: inline-block; cursor: pointer;">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    @else
                    @endauth
                </ul>
                </ul>

                <form method="GET" action="{{ route('productos.index') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="query" value="{{ request()->query('query') }}"
                            class="form-control" placeholder="¿Que producto buscas?" aria-label="Buscar producto">
                        <button class="btn btn-warning"
                            style= "font-weight: bold; font-size: 23px; border: 4px solid #989302d6; color: #932e02;"
                            type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

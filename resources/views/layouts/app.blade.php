<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="La Galemba - Your go-to place for fresh produce">
    <title>La Galemba @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/catalogo.css') }}" rel="stylesheet">

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
            overflow-x: hidden; /* Oculta el desbordamiento horizontal */
        }

        .navbar {
            background-color: #2ac52f;
            width: 100%;
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
            font-size: 25px;
            /* Tamaño de la fuente */
            font-weight: bolder;
            /* Grosor de la fuente */
            color: #bc2e07;
            /* Color del texto */
            font-family: system-ui;
            /* Estilo de la fuente */
        }

        .navbar .nav-item .nav-link:hover {
            color: #f5e42e;
            /* Color del texto al pasar el cursor */
            text-decoration: underline;
            /* Subrayar al pasar el cursor */
        }

        .d-flex .form-control {
            width: 300px;
            /* Ajusta el ancho del campo de búsqueda */
            font-size: 20px;
            /* Ajusta el tamaño de la fuente del campo de búsqueda */
        }

        .d-flex .btn-warning {
            font-size: 20px;
            /* Ajusta el tamaño del botón de búsqueda */
            padding: 9px 28px;
            /* Ajusta el padding del botón */
        }

        .navbar-brand img {
            height: 150px;
            padding: 10px;
            max-width: 100%;
            box-sizing: border-box;
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
                <img src="{{ asset('imagenes/LOGO FRUVER (1).png') }}" alt="Logo Fruver"
                    style="height: 150px; padding: 0px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mi carrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Mi cuenta</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="¿Qué producto buscas?"
                        aria-label="search">
                    <button type="button" class="btn btn-warning">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

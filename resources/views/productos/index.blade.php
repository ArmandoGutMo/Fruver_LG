@extends('layouts.app')

@section('title', 'Catálogo')

@section('content')
    <br>
    <br>

    <style>
        :root {
            --fondo: #cad7bd;
            --espacios-contenido: 45px;
        }

        body {
            background-image: url('{{ asset('imagenes/FRUVER-02.png') }}'), linear-gradient(to right, #890909fa, #d8746dfa);
            background-blend-mode: soft-light;
            background-color: var(--fondo);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            margin-bottom: 30px;
            /* Añade margen inferior a las tarjetas */
        }

        .btn-margin-left {
            margin-left: 50px;
            /* Ajusta este valor según sea necesario */
        }

        .btn-container {
            margin-bottom: 50px;
        }


    </style>



    <h1 class="text-center fw-bolder" style="color: #b61004fa; font-size: 55px; padding: 40px;">Catálogo de Productos</h1>

    <div class="container btn-container">

        @auth
            @if (Auth::user()->role === 'cliente')
                <a href="{{ route('carrito.index') }}" class="btn btn-warning btn-align-right"
                    style="font-weight: bold; font-size: 22px; border: 4px solid #989302d6; color: #932e02;">Mi carrito</a>
            @elseif (Auth::user()->role === 'admin')
                <a href="{{ route('productos.create') }}" class="btn btn-warning btn-align-right"
                    style="font-weight: bold; font-size: 22px; border: 4px solid #989302d6; color: #932e02;">Editar catalogo</a>
            @endif
        @endauth

    </div>

    <br>
    <div class="container">
        <div class="row">
            @foreach ($product as $prod)
                <div class="col-sm">
                    <div class="card" style="width: 17rem; height: 85%">
                        <img style="height: 170px; max-width:250px; margin:20px; "src={{ Storage::url($prod->imagen) }}
                            class="card-img-top mx-auto d-block" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $prod->nombre }}</h5>
                            <p class="card-text">Precio:{{ $prod->precio }}</p>
                            @if (!empty($prod->promocion))
                                <p class="card-text">Promoción:{{ $prod->promocion }}</p>
                            @endif
                            <!-- Formulario para agregar al carrito -->
                            @auth
                                @if (Auth::user()->role === 'cliente')
                                    <!-- Botón para clientes: Agregar al carrito -->
                                    <form action="{{ route('carrito.agregar', $prod->id) }}" method="POST">
                                        @csrf
                                        <input type="number" name="cantidad" value="1" min="1"
                                            class="form-control mb-2" style="width: 100px;" required>
                                        <button type="submit" class="btn btn-success"
                                            style="font-weight: bold; font-size: 16px; border: 4px;">Agregar al carrito</button>
                                    </form>
                                @elseif (Auth::user()->role === 'admin')
                                    <!-- Botón para administradores: Ver producto -->
                                    <a href="{{ route('productos.show', $prod->id) }}" class="btn btn-success"
                                        style="font-weight: bold; font-size: 16px; border: 4px;">Ver
                                        Producto</a>
                                @endif
                            @endauth

                        </div>
                    </div>
                    <br>
                    <br>

                </div>
            @endforeach

        </div>
    </div>


@endsection

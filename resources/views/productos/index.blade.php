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

        .card-img-top {
            object-fit: cover;
            /* Ajusta la imagen para que cubra el espacio de la tarjeta */
        }

        .card {
            margin-bottom: 30px;
            /* Añade margen inferior a las tarjetas */
        }

        .btn-margin-left {
            margin-left: 50px;
            /* Ajusta este valor según sea necesario */
        }
    </style>

    <h1 class="text-center fw-bolder" style="color: #b61004fa; font-size: 50px;">Catálogo de Productos</h1>
    <div class="text-start mb-3">
        <a href="{{ route('productos.create') }}" class="btn btn-warning btn-margin-left"
            style="font-weight: bold; font-size: 18px; border: 4px solid #083214; color: #103218;">Agregar Nuevo Producto</a>
    </div>
    <br>
    <div class="container">
        <div class="row">
            @foreach ($product as $prod)
                <div class="col-sm">
                    <div class="card" style="width: 17rem;">
                        <img style="height: 200px; width:250px; margin:20px; "src={{ Storage::url($prod->imagen) }}
                            class="card-img-top mx-auto d-block" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $prod->nombre }}</h5>
                            <a href="/productos/{{ $prod->id }}" class="btn btn-success">Ver Producto</a>
                        </div>
                    </div>
                    <br>
                    <br>

                </div>
            @endforeach

        </div>
    </div>


@endsection

@extends('layouts.app')

@section('title', 'Producto')

@section('content')

    <style>
        :root {
            --fondo: #f4c779;
            --espacios-contenido: 45px;

        }

        body {
            margin: 0;
            margin: 0;
            background-image: url('{{ asset('imagenes/FONDO.jpg') }}'), linear-gradient(to right, #890909fa, #f4c572);
            background-blend-mode: soft-light;
            background-color: var(--fondo);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 140vh;
            margin: 0;
        }
        .card-text {
            font-size: 18px;
            /* Tamaño de la fuente */
            font-weight: bold;
            /* Grosor de la fuente */
            color: #971d0d;
            /* Color del texto */
            letter-spacing: 1px;
            /* Espaciado entre letras */
            margin-bottom: 10px;
            /* Margen inferior */
        }

        .btn-margin-left {
            margin-left: 50px;
            /* Ajusta este valor según sea necesario */
        }
    </style>

    <br>
    <h3 class="text-center fw-bolder" style="color: #920e05fa; font-size: 50px;">Productos</h3>
    <br>
    <a href="{{ route('productos.index') }}" class="btn btn-success btn-margin-left"
        style= "font-weight: bold; font-size: 18px; border: 4px solid #12b103; color: #f8fbf9;">Ir al Catálogo</a>

    <div class="text-center">
        <img style="height: 350px; width:350px; margin:15px" src="{{ Storage::url($product->imagen) }}"
            class="card-img-top mx-auto d-block" alt="...">
        <div class="card-body">
            <p class="card-text">Nombre: {{ $product->nombre }}</p>
            <p class="card-text">Precio: {{ $product->precio }}</p>
            <p class="card-text">Promoción: {{ $product->promocion }}</p>
        </div>
        <br>
        <a href="/productos/{{ $product->id }}/edit" class="btn btn-success"
            style= "font-weight: bold; font-size: 18px; border: 4px solid #057a03; color: #f6f9f7;">Editar Producto</a>
        <br>
        <br>

        <form action="{{ route('productos.destroy', $product->id) }}" method="POST"
            onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                style= "font-weight: bold; font-size: 18px; border: 4px solid #ba0707; color: #faf7f6;">Eliminar</button>
        </form>
    </div>
    <br>
    <br>

@endsection

@extends('layouts.app')

@section('title', 'Agregar Producto')

@section('content')

    <style>
        :root {
            --fondo: #b8e9d7;
            --espacios-contenido: 45px;
        }

        body {
            background-image: url('{{ asset('imagenes/Fruver 4.jpg') }}'), linear-gradient(to right, #b7514afa, #d8746dfa);
            background-blend-mode: soft-light;
            background-color: var(--fondo);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;


        }

        .form-label {
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

        .form-container {
            margin: 0 auto;
            padding: 20px;
            max-width: 1000px;
            border-radius: 50px;
            box-shadow: 5px 5px 80px rgba(243, 9, 9, 0.47);
            margin-top: 20px;
            margin-bottom: 30px; /* Añadir margen inferior */
        }

        .form-control {
            margin-bottom: 20px;
        }

    </style>


    <br><br>
    <h3 class="text-center fw-bolder" style="color: #ab0f04fa; font-size: 50px;">Agregar Productos</h3>
    <br>
    <a href="{{ route('productos.index') }}" class="btn btn-danger btn-margin-left"
        style= "font-weight: bold; font-size: 18px; border: 4px solid #ba0707; color: #f8fbf9;">Ir al Catálogo</a>
    <br>
    <div class="form-container">
        <form action="/productos" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0"
                    value="{{ old('precio') }}">
                @error('precio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="promocion" class="form-label">Promoción</label>
                <input type="text" class="form-control" id="promocion" name="promocion" value="{{ old('promocion') }}">
                @error('promocion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="mb-3">
                <label for="imagen" class="form-label">Subir imagen</label>
                <br>
                <input id="imagen" type="file" name="imagen">
                @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-warning"
                style= "font-weight: bold; font-size: 18px; border: 4px solid #a5a300; color: #ab0e03;">Guardar</button>
            <br>
            <br>
        </form>
    </div>
@endsection

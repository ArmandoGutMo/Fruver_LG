@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')

    <style>
        :root {
            --fondo: #f0cbcb;
            --espacios-contenido: 45px;
        }

        body {
            background-image: url('{{ asset('imagenes/Fruver 5.png') }}'), linear-gradient(to right, #8feca3fa, #8feca3fa);
            background-blend-mode: soft-light;
            background-color: var(--fondo);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            box-sizing: border-box;
        }

        .form-label {
            font-size: 18px;
            font-weight: bold;
            color: #326733;
            letter-spacing: 1px;
            margin-bottom: 10px;
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
            box-shadow: 4px 4px 50px rgba(17, 174, 3, 0.47);
            margin-top: 20px;
            margin-bottom: 30px; /* Añadir margen inferior */
        }

        .form-control {
            margin-bottom: 20px;
        }
    </style>


    <br>
    <br>
    <h3 class="text-center fw-bolder" style="color: #026718fa; font-size: 50px;">Editar Productos</h3>
    <br>
    <br>
    <a href="{{ route('productos.index') }}" class="btn btn-danger btn-margin-left"
        style= "font-weight: bold; font-size: 18px; border: 4px solid #a12202; color: #f8fbf9;">Ir al Catálogo</a>
    <br>
    <br>
    <div class="form-container">
        <form action="/productos/{{ $product->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="producto" class="form-label">Producto</label>
                <input name="nombre" id="producto" value="{{ old('nombre', $product->nombre) }}" type="text"
                    class="form-control @error('nombre') is-invalid @enderror">
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input name="precio" id="precio" value="{{ old('precio', $product->precio) }}" type="number"
                    step="0.01" class="form-control @error('precio') is-invalid @enderror">
                @error('precio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="promocion" class="form-label">Promoción</label>
                <input name="promocion" id="promocion" value="{{ old('promocion', $product->promocion) }}" type="text"
                    class="form-control @error('promocion') is-invalid @enderror">
                @error('promocion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="mb-3">
                <label for="imagen" class="form-label">Cambiar imagen</label>
                <br>
                <input id="imagen" type="file" name="imagen">
                @error('imagen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-warning"
                style= "font-weight: bold; font-size: 18px; border: 4px solid #989302; color: #932e02;">Guardar</button>
            <br>
            <br>
        </form>
    </div>

@endsection

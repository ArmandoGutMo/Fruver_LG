@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')

<style>
    :root {
        --fondo: #cad7bd;
        --espacios-contenido: 45px;
    }

    body {
        background-image: url('{{ asset('imagenes/LOGO FRUVER.png') }}'), linear-gradient(to right, #890909fa, #890909fa);
        background-blend-mode: soft-light;
        background-color: var(--fondo);
        background-size: content;
        background-position: center bottom;
        background-repeat: no-repeat;
        min-height: 100vh;
        margin: 0;
        box-sizing: border-box;
    }
</style>

<div class="container mt-5">
    <br>
    <br>
    <br>
    <h1 class="text-rigth fw-bolder" style="color: #026718fa; font-size: 38px;">Carrito de compras</h1>
    <br>
    @if (session('carrito') && count(session('carrito')) > 0)
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr style="font-weight: bold; font-size: 25px;">
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalCompra = 0;
                @endphp
                @foreach ($carrito as $producto)
                    @php
                        // Inicialización de variables para el cálculo
                        $precioUnitario = $producto['precio_unitario'];
                        $cantidad = $producto['cantidad'];
                        $promocion = isset($producto['promocion']) ? $producto['promocion'] : null;
                        $precioTotal = 0;

                        // Verificación de la promoción
                        if ($promocion && preg_match('/(\d+)x(\d+)/', $promocion, $matches)) {
                            $cantidadPromocion = (int) $matches[1];  // La cantidad de productos necesarios para la promoción
                            $precioPromocion = (int) $matches[2];    // El precio total de la promoción

                            // Si la cantidad del producto es mayor o igual que la cantidad mínima para la promoción
                            if ($cantidad >= $cantidadPromocion) {
                                // Calcular cuántas promociones completas se pueden aplicar
                                $cantidadPromociones = intdiv($cantidad, $cantidadPromocion);
                                $resto = $cantidad % $cantidadPromocion;

                                // Precio total es el precio de las promociones completas más el precio de los productos restantes
                                $precioTotal = ($cantidadPromociones * $precioPromocion) + ($resto * $precioUnitario);
                            } else {
                                // Si no se aplica la promoción, el precio total es el precio normal
                                $precioTotal = $precioUnitario * $cantidad;
                            }
                        } else {
                            // Si no hay promoción, calcula el precio total normal
                            $precioTotal = $precioUnitario * $cantidad;
                        }

                        // Acumular el total de la compra
                        $totalCompra += $precioTotal;
                    @endphp
                    <tr style="font-weight: bold; font-size: 15px;">
                        <td>{{ $producto['nombre'] }}</td>
                        <td>${{ number_format($precioUnitario, 2) }}</td>
                        <td>{{ $cantidad }}</td>
                        <td>${{ number_format($precioTotal, 2) }}</td>
                        <td>
                            <form action="{{ route('carrito.eliminar', $producto['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <br>

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('productos.index') }}" class="btn btn-success" style="font-weight: bold; font-size: 18px; border: 4px solid #139802d7; color: #f5efed;">Seguir comprando</a>
            </div>
            <div class="col-md-6 text-right">
                <h4 style="font-weight: bold; font-size: 40px; color: #7a0e06;">Total Compra: ${{ number_format($totalCompra, 2) }}</h4>
                <br>
                <a href="" class="btn btn-warning" style="font-weight: bold; font-size: 20px; border: 4px solid #989302d6; color: #932e02;">Proceder al pago</a>
            </div>
        </div>
        <br>
        <br>
    @else
        <div class="alert alert-success" role="alert" style="font-weight: bold; font-size: 17px; color: #004114;">
            Tu carrito está vacío.
        </div>
        <div>
            <a href="{{ route('productos.index') }}" class="btn btn-warning" style="font-weight: bold; font-size: 20px; border: 4px solid #989302d6; color: #932e02;">Ir a la tienda</a>
        </div>
    @endif
</div>
@endsection

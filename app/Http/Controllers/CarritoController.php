<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;

class CarritoController extends Controller
{

    public function index()
    {
        // Obtiene los productos del carrito desde la sesión
        $carrito = collect(session('carrito', []));
        $totalCompra = 0;

        // Calcula el total del carrito asegurándose de aplicar la promoción correctamente
        foreach ($carrito as $producto) {
            $precioUnitario = isset($producto['precio_unitario']) ? $producto['precio_unitario'] : 0;
            $cantidad = isset($producto['cantidad']) ? $producto['cantidad'] : 0;
            $promocion = isset($producto['promocion']) ? $producto['promocion'] : null;

            // Verifica si hay una promoción válida
            if ($promocion && $cantidad >= 3) {
                // Separa la promoción en cantidad mínima y precio promocional
                if (preg_match('/(\d+)x(\d+)/', $promocion, $matches)) {
                    $cantidadPromocion = (int)$matches[1];  // Cantidad para la promoción (ej: 3 en 3x4000)
                    $precioPromocion = (float)$matches[2];  // Precio total para la promoción (ej: 4000 en 3x4000)

                    // Si la cantidad cumple con la promoción
                    if ($cantidad >= $cantidadPromocion) {
                        // Calcula el precio promocional por unidad
                        $precioUnitarioPromocion = $precioPromocion / $cantidadPromocion;
                        $precioFinal = $precioUnitarioPromocion * $cantidad;
                    } else {
                        // No se cumple la cantidad mínima, usa precio normal
                        $precioFinal = $precioUnitario * $cantidad;
                    }
                } else {
                    // Si el formato de la promoción no es válido, usa precio normal
                    $precioFinal = $precioUnitario * $cantidad;
                }
            } else {
                // Precio normal si no aplica la promoción
                $precioFinal = $precioUnitario * $cantidad;
            }

            // Suma el total al carrito
            $totalCompra += $precioFinal;
        }

        // Retorna la vista con los productos y el total
        return view('carrito.index', compact('carrito', 'totalCompra'));
    }





    public function agregar($productoId, Request $request)
    {
        // Verifica si el producto existe
        $producto = Producto::find($productoId);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }

        // Recupera el carrito de la sesión, asegurándose de que sea un array
        $carrito = session()->get('carrito', []);

        // Obtiene la promoción del producto, si existe
        $promocion = $producto->promocion;

        // Verifica si el producto ya está en el carrito
        if (isset($carrito[$productoId])) {
            // Si ya está, aumentar la cantidad
            $carrito[$productoId]['cantidad'] += (int) $request->input('cantidad', 1);

            // Actualiza el precio total basado en la nueva cantidad y la promoción
            if ($promocion) {
                $carrito[$productoId]['precio_total'] = $this->calcularPrecioConPromocion($carrito[$productoId], $promocion);
            } else {
                // Si no tiene promoción, calcula el precio normal
                $carrito[$productoId]['precio_total'] = $carrito[$productoId]['precio_unitario'] * $carrito[$productoId]['cantidad'];
            }
        } else {
            // Si no está, agregarlo al carrito
            $carrito[$productoId] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio_unitario' => $producto->precio,
                'cantidad' => (int) $request->input('cantidad', 1),
                'promocion' => $promocion,  // Guarda la promoción en el carrito
            ];

            // Calcula el precio total con promoción (si existe)
            if ($promocion) {
                $carrito[$productoId]['precio_total'] = $this->calcularPrecioConPromocion($carrito[$productoId], $promocion);
            } else {
                // Si no tiene promoción, calcula el precio normal
                $carrito[$productoId]['precio_total'] = $carrito[$productoId]['precio_unitario'] * $carrito[$productoId]['cantidad'];
            }
        }

        // Guarda el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        return redirect()->route('productos.index')->with('success', 'Producto agregado al carrito');
    }

    // Función para calcular el precio con la promoción
    private function calcularPrecioConPromocion($producto, $promocion)
    {
        // Expresión regular para extraer la cantidad y el precio de la promoción
        if (preg_match('/(\d+)x(\d+)/', $promocion, $matches)) {
            $cantidadPromocion = (int) $matches[1];  // La cantidad de productos necesarios para la promoción
            $precioPromocion = (int) $matches[2];    // El precio total de la promoción

            // Si la cantidad del producto es mayor o igual que la cantidad mínima para la promoción
            if ($producto['cantidad'] >= $cantidadPromocion) {
                // Calcular cuántas promociones completas se pueden aplicar
                $cantidadPromociones = intdiv($producto['cantidad'], $cantidadPromocion);
                $resto = $producto['cantidad'] % $cantidadPromocion;

                // Precio total es el precio de las promociones completas más el precio de los productos restantes
                return ($cantidadPromociones * $precioPromocion) + ($resto * $producto['precio_unitario']);
            } else {
                // Si no se aplica la promoción, el precio total es el precio normal
                return $producto['precio_unitario'] * $producto['cantidad'];
            }
        }

        // Si no tiene formato válido de promoción, simplemente retorna el precio normal
        return $producto['precio_unitario'] * $producto['cantidad'];
    }






    // Eliminar un producto del carrito
    public function eliminar($productoId)
    {
        // Obtener los productos del carrito
        $carrito = Session::get('carrito', []);

        // Verificar si el producto existe en el carrito
        if (isset($carrito[$productoId])) {
            // Eliminar el producto del carrito
            unset($carrito[$productoId]);
        }

        // Guardar el carrito actualizado en la sesión
        Session::put('carrito', $carrito);

        return redirect()->route('carrito.index');
    }
}

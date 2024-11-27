<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * Atributos
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'precio',
        'promocion',
        'imagen',
    ];


     /**
     *Relación con el modelo Carrito.
     */
    public function carritos()
    {
        return $this->hasMany(Carrito::class);
    }



    /**
     * Calcular el precio promocional basado en la cantidad.
     *
     * @param int $cantidad
     * @return float
     */
    public function getPrecioPromocional($cantidad)
    {
        // Verificar si hay una promoción válida en formato 'NxPrecio' (por ejemplo, '3x2000')
        if (preg_match('/^(\d+)x(\d+)$/', $this->promocion, $matches)) {
            $promocionCantidad = (int)$matches[1]; // Número de unidades en la promoción
            $promocionPrecio = (int)$matches[2];   // Precio total de la promoción

            // Calcular cuántas veces se aplica la promoción
            $promocionVeces = intdiv($cantidad, $promocionCantidad);
            $restantes = $cantidad % $promocionCantidad;

            // Calcular el precio total aplicando la promoción
            $precioTotal = ($promocionVeces * $promocionPrecio) + ($restantes * $this->precio);
            return $precioTotal;
        }

        // Si no hay una promoción válida, devolver el precio normal multiplicado por la cantidad
        return $this->precio * $cantidad;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    // Especificar la tabla correspondiente en la base de datos
    protected $table = 'productos_carrito';

    // Definir los campos que se pueden asignar de forma masiva
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    /**
     * Relación con el modelo User (un carrito pertenece a un usuario)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el modelo Producto (un carrito tiene un producto)
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'product_id');
    }
}

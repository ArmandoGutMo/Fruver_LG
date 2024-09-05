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
}

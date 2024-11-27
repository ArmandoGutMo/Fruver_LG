<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
          // Obtener todos los productos desde la base de datos
          $productos = Producto::all();

          // Retornar la vista del Home con los productos
          return view('home', compact('productos'));
    }
}

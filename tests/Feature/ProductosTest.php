<?php

namespace Tests\Feature;

use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductosTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product(): void
    {

        // Usando la clase Producto para crear un producto
        $producto = Producto::create([
            'nombre' => 'Producto Test',
            'precio' => 100,
            'promocion' => '10%',
            'imagen' => 'image_path.jpg',
        ]);

        // Verificar que el producto esté en la base de datos
        $this->assertDatabaseHas('productos', [
            'nombre' => 'Producto Test',
            'precio' => 100,
            'promocion' => '10%',
            'imagen' => 'image_path.jpg',
        ]);


    }

}

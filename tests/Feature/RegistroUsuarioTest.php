<?php

namespace Tests\Feature;

use App\Models\User; // Asegúrate de tener el modelo User
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistroUsuarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_registro_usuario(): void
    {
        // Datos de prueba
        $data = [
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'direccion' => 'Calle Falsa 123',
            'telefono' => '1234567890',
            'password' => 'password', // Asegúrate de incluir la contraseña
            'password_confirmation' => 'password', // Asegúrate de incluir la confirmación de la contraseña
        ];

        // Realizar la petición POST para registrar el usuario
        $response = $this->post('/register', $data);

        // Verificar que se redirija a una ruta específica
        $response->assertRedirect('/dashboard');

        // Verificar que el usuario se haya creado en la base de datos
        $this->assertDatabaseHas('users', [
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'direccion' => 'Calle Falsa 123',
            'telefono' => '1234567890',
        ]);
        dd(User::all());
    }
}


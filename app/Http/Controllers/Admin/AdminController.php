<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Muestra el formulario de registro de administrador
    public function showRegistrationForm()
    {

        return view('admin.register');
    }

    // Registra a un nuevo administrador
    public function register(Request $request)
    {
        // Validación de los datos del formulario
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.register')
                ->withErrors($validator)
                ->withInput();
        }

        // Crear un nuevo usuario con el rol de administrador
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',  // Asigna el rol de 'admin'
        ]);

        // Redirigir al administrador con un mensaje de éxito
        return redirect()->route('productos.index')
            ->with('success', 'Administrador registrado correctamente.');
    }
}

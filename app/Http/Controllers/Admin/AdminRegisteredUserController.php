<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AdminRegisteredUserController extends Controller
{
    /**
     * Mostrar el formulario de registro para administradores.
     */
    public function create(): View
    {
        return view('admin.register'); // Aquí asumes que tienes una vista llamada 'admin.register'
    }

    /**
     * Manejar la solicitud de registro para administradores.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'telefono' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Crear un nuevo usuario con rol 'admin'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Asignar el rol de administrador
        ]);

        // Disparar evento de registro (esto es opcional)
        event(new Registered($user));

        // Enviar la notificación de verificación por correo electrónico
        $user->sendEmailVerificationNotification();

        // Iniciar sesión automáticamente al usuario
        Auth::login($user);

        // Redirigir al panel de administración
        return redirect()->route('admin.dashboard'); // Debes crear la ruta 'admin.dashboard'
    }
}



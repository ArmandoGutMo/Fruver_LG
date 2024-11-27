<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminRegisteredUserController;
use Illuminate\Support\Facades\Route;

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Ruta para la página del Home
Route::get('/home', [HomeController::class, 'index'])->name('home.index');


// Ruta para el dashboard con middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas agrupadas para la gestión del perfil con middleware 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para el carrito
    Route::prefix('carrito')->name('carrito.')->group(function () {
        Route::get('/', [CarritoController::class, 'index'])->name('index'); // Ver carrito
        Route::post('agregar/{productoId}', [CarritoController::class, 'agregar'])->name('agregar'); // Agregar al carrito
        Route::delete('eliminar/{productoId}', [CarritoController::class, 'eliminar'])->name('eliminar'); // Eliminar del carrito
    });
});

Route::get('register', [RegisteredUserController::class, 'create'])->name('register'); // Vista de registro cliente
Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store'); // Guardar registro cliente

// Rutas de registro para administradores
Route::get('admin/register', [AdminRegisteredUserController::class, 'create'])->name('admin.register'); // Vista de registro admin
Route::post('admin/register', [AdminRegisteredUserController::class, 'store'])->name('admin.register.store'); // Guardar registro admin


Route::resource('/productos', ProductoController::class);

Route::middleware([CheckAdmin::class])->group(function () {
    Route::resource('/productos.index', ProductoController::class);
});



Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Incluir rutas de autenticación
require __DIR__ . '/auth.php';

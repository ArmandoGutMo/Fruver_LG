@extends('layouts.app')

@section('title', 'Login')

@section('content')
<br><br>
<style>
    :root {
        --fondo: #cae69aeb;
        --espacios-contenido: 45px;
    }
    body {
        background-image: url('{{ asset('imagenes/FRUVER-02.png') }}'), linear-gradient(to right, #890909fa, #d8746dfa);
        background-blend-mode: soft-light;
        background-color: var(--fondo);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        margin: 0;
    }
    .btn-success {
        display: block;
        margin-bottom: 10px;
        width: 40%; /* Hace que los botones ocupen todo el ancho del contenedor */
    }
    .text-center p {
        margin-bottom: 0;
    }
    .text-center a.btn-success {
        width: 40%; /* Hace que el botón "Regístrate aquí" ocupe el 50% del ancho */
        display: block;
        margin: 10px auto 0 auto; /* Centra el botón horizontalmente */
    }
    .form-container {
        background: linear-gradient(to right, #f7b681, #f76d35); / /* Color de fondo del formulario */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 10px 10px 50px rgba(130, 8, 8, 0.58);
    }
    label {
        color: #11672b; /* Cambia el color del texto de las etiquetas */
        font-weight: bold; /* Hace que el texto sea negrita */
        display: block; /* Asegura que las etiquetas ocupen toda la línea */
        margin-bottom: 5px; /* Espacio debajo de las etiquetas */
    }
</style>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="card form-container">
            <div class="card-header bg-success text-white">
                {{ __('Inicio de sesión') }}
            </div>
            <div class="card-body">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Usuario -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Usuario')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                    </div>
                    <!-- Contraseña -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Contraseña')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                    </div>
                    <!-- Recordar -->
                    <div class="mb-3 form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Recordar') }}</label>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        @if (Route::has('password.request'))
                            <a class="text-light mb-3" href="{{ route('password.request') }}">
                                {{ __('¿Olvidó su contraseña?') }}
                            </a>
                        @endif
                        <button type="submit" class="btn btn-success">
                            {{ __('Iniciar sesión') }}
                        </button>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="text-sm text-light">
                            ¿No tienes una cuenta?
                        </p>
                        <a href="{{ route('register') }}" class="btn btn-success">Crear cuenta</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

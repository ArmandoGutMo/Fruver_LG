@extends('layouts.app')

@section('title', 'Registro de usuario')

@section('content')
    <br>
    <br>
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

        .form-container {
            margin: 20px;
            padding: 25px;
            background: linear-gradient(to right, #f7b681, #f76d35);
            /* Color de fondo del formulario */
            border-radius: 8px;
            box-shadow: 10px 10px 50px rgba(130, 8, 8, 0.58);
        }

        .card {
            padding: 20px;
        }

        .form-control {
            padding: 10px;
        }

        .btn-success {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
        }

        /* Estilos para el encabezado de la tarjeta */
        .card-header-custom {
            font-size: 1.5rem;
            /* Ajusta el tamaño de la fuente según sea necesario */
            padding: 15px;
            /* Ajusta el padding para aumentar el espacio interno */
            text-align: center;
            /* Centra el texto si es necesario */
        }

        label {
            color: #11672b;
            /* Cambia el color del texto de las etiquetas */
            font-weight: bold;
            /* Hace que el texto sea negrita */
            display: block;
            /* Asegura que las etiquetas ocupen toda la línea */
            margin-bottom: 5px;
            /* Espacio debajo de las etiquetas */
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card form-container">
                <div class="card-header bg-success text-white card-header-custom">
                    {{ __('Registro de usuario') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3">
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                                required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Correo Electrónico')" />
                            <x-text-input id="email" class="form-control" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3">
                            <x-input-label for="telefono" :value="__('Teléfono')" />
                            <x-text-input id="telefono" class="form-control" type="tel" name="telefono"
                                :value="old('telefono')" required />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2 text-danger" />
                        </div>

                        <!-- Dirección -->
                        <div class="mb-3">
                            <x-input-label for="direccion" :value="__('Dirección')" />
                            <x-text-input id="direccion" class="form-control" type="text" name="direccion"
                                :value="old('direccion')" required />
                            <x-input-error :messages="$errors->get('direccion')" class="mt-2 text-danger" />
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <x-input-label for="password" :value="__('Contraseña')" />
                            <x-text-input id="password" class="form-control" type="password" name="password" required
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-3">
                            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                            <x-text-input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="text-success" href="{{ route('login') }}">
                                {{ __('Ingresar a mi cuenta') }}
                            </a>

                            <x-primary-button class="ms-4 btn btn-success">
                                {{ __('Registrarme') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

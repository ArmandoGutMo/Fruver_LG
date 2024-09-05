@extends('layouts.app')

@section('title', '¿Olvidaste la contraseña?')

@section('content')

    <style>
        label {
            color: #d62f05;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

    </style>

    <div class="container mt-5">
        <h1 class="mb-4 text-success">¿Olvidaste la contraseña?</h1>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning"
               style= "font-weight: bold; font-size: 18px; border: 4px solid #a5a300; color: #047b1e;">
                Restablecer Contraseña
            </button>
        </form>
    </div>
@endsection

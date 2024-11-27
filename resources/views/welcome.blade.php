@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')

<div class="row justify-content-center contactanos"
        style="background-color: #066915; max-height: 700px; overflow: hidden;">
        <div class="col-md-7">
            <div>
                <br>
                <br>
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <h1 class="text-rigth fw-bolder" style="color: #f3f9f4fa; font-size: 40px;">¡Bienvenidos a La Galemba Tienda Online!</h1>
                    </blockquote>
                    <br>
                </figure>
                <div class="col-12 text-center">
                    <img src="{{ asset('imagenes/LOGO FRUVER.png') }}" alt="Imagen de contacto"
                        class="img-fluid mx-auto d-block" style="height: 270px; padding: 2px;">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h3 class="text-rigth fw-bolder" style="color: #ffc66bfa; font-size: 25px; margin-bottom:50px;">Nos alegra que estés con nosotros. Disfruta de una experiencia única, donde puedes explorar y aprovechar al máximo todo lo que tenemos para ofrecerte.</h3>
                </div>

            </div>
        </div>

        <!-- Tarjeta Promociones -->
        <div class="col-md-5"
        style="background-color: #f2f9f3; max-height: 700px; overflow: hidden;">

        <div class="row mt-4">
        <div class="col-12 text-center">
            <h1 class="text-rigth fw-bolder" style="color: #bd7b09fa; font-size: 45px; padding: 60px;">¡Comienza tu recorrido y descubre todo lo que tenemos para ti!</h1>
        </div>

        <div class="col-12 text-center">
            <h3 class="text-rigth fw-bolder" style="color: #d88b06fa; font-size: 35px;">Iniciar como:</h3>
        </div>
        </div>

        <div class="col-12 text-center mt-4">
            <a href="{{ route('admin.register') }}" class="btn btn-warning"
                style= "font-weight: bold; font-size: 20px; border: 4px solid #989302d6; color: #932e02;">
                Administrador
            </a>
        </div>

        <div class="col-12 text-center mt-4">
            <a href="{{ route('register') }}" class="btn btn-warning"
                style= "font-weight: bold; font-size: 20px; border: 4px solid #989302d6; color: #932e02;">
                Cliente
            </a>
        </div>


        </div>
    </div>

@endsection

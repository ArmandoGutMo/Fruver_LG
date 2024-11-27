@extends('layouts.app')

@section('title', 'Fruver La Galemba')

@section('content')

    <style>
        .carousel-inner {
            margin-top: 0;
            margin-bottom: 0;
        }


        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(180, 2, 2, 0.897);
            border-radius: 50%;
            width: 4rem;
            height: 4rem;
            border-style: solid;
        }


        .texto-con-borde {
            color: #fffbfa;
            font-size: 100px;
            text-shadow:
                3px 3px 2px rgb(230, 4, 4),
                -3px -3px 2px rgb(194, 4, 4),
                3px -3px 2px rgb(215, 4, 4),
                -3px 3px 2px rgb(207, 4, 4);
        }

        .invitacion a {
            margin-bottom: 50px;
            width: 220px;
        }


        .contactanos h3 {
            padding: 8px;
        }


        .servicio {
            background-color: #e7d518;
            padding: 50px 50px;
            margin-bottom: 50px;

        }

        .servicio .col-md-4 {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .servicio .col-md-4:hover {
            transform: translateY(-10px);
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
        }

        .servicio i {
            background-color: #fff9f94e;
            padding: 50px;
            border-radius: 50%;
            color: #09a320 !important;
            font-size: 50px;
            transition: background-color 0.3s ease;
        }

        .servicio i:hover {
            background-color: #f93a056c;
            color: #fffbfa;
        }

        .servicio h2 {
            margin-top: 20px;
            margin-bottom: 130px;
        }

        .servicio h4 {
            margin-top: 70px;
        }

        .servicio p {
            margin-top: 20px;
        }
    </style>



    <!-- Seccion Componente Carrusel -->
    <div id="carousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('Imagenes/VEGETALES HTML2.png') }}" class="d-block w-100" alt="Vegetales">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="texto-con-borde">50% de descuento</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('Imagenes/FRUTAS-HTML2.jpg') }}" class="d-block w-100" alt="Frutas">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="texto-con-borde">30% de descuento</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('Imagenes/CARNES-HTML2.jpg') }}" class="d-block w-100" alt="Carnes">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="texto-con-borde">10% de descuento</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>

    <!-- Sección Nuestros Servicios -->
    <div class="container-fluid mt-5 servicio">
        <h2 class="text-center fw-bolder" style="color: #fa0c0c; font-size: 55px;">Nuestros Servicios</h2>
        <div class="row mt-4">
            <div class="col-md-4 text-center">
                <i class="bi bi-truck display-3 text-primary"></i>
                <h4 class="text-center fw-bolder" style="color: #d50606; font-size: 30px;">Entrega a Domicilio</h4>
                <p class="text-center fw-bolder" style="color: #d50606; font-size: 20px;">Recibe tus compras en la puerta de
                    tu casa de forma rápida y segura.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-shop display-3 text-primary"></i>
                <h4 class="text-center fw-bolder" style="color: #d50606; font-size: 30px;">Compra en Tienda</h4>
                <p class="text-center fw-bolder" style="color: #d50606; font-size: 20px;">Visita nuestra tienda física y
                    descubre nuestras ofertas exclusivas.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-tags display-3 text-primary"></i>
                <h4 class="text-center fw-bolder" style="color: #d50606; font-size: 30px;">Promociones</h4>
                <p class="text-center fw-bolder" style="color: #d50606; font-size: 20px;">Aprovecha nuestras promociones
                    semanales con descuentos en frutas y verduras.</p>
            </div>
        </div>
    </div>


    <!-- Sección invitación Crear Cuenta -->
    <div class="container-fluid mt-5 invitacion">
        <h2 class="text-center fw-bolder" style="color: #047a10; font-size: 55px;"> ¡Crea Tu Cuenta!</h2>
        <p class="text-center fw-bolder" style="color: #045f25; font-size: 25px; padding: 10px;">Y disfruta de descuentos
            exclusivos,
            promociones y la comodidad de comprar en línea.</p>
        <div class="row mt-4">

            <!-- Tarjeta Carnes -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-danger">
                    <img src="{{ asset('imagenes/CARNES-HTML2.jpg') }}" class="card-img-top" alt="Carnes">
                    <div class="card-body">
                        <h4 class="text-center fw-bolder" style="color: #850404; font-size: 30px;">Carnes</h4>
                        <p class="text-center fw-bolder" style="color: #850404; font-size: 20px;">Deliciosas y frescas
                            carnes de alta calidad, ideales para tus
                            comidas.</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta Frutas -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-warning">
                    <img src="{{ asset('imagenes/FRUTAS-HTML2.jpg') }}" class="card-img-top" alt="Frutas">
                    <div class="card-body">
                        <h4 class="text-center fw-bolder" style="color: #e8880a; font-size: 30px;">Frutas</h4>
                        <p class="text-center fw-bolder" style="color: #e8880a; font-size: 20px;">Frutas frescas y jugosas
                            para disfrutar en cualquier momento del
                            día.</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta Verduras -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-warning">
                    <img src="{{ asset('imagenes/VEGETALES HTML2.png') }}" class="card-img-top" alt="Verduras">
                    <div class="card-body">
                        <h4 class="text-center fw-bolder" style="color: #d1ba0a; font-size: 30px;">Verduras</h4>
                        <p class="text-center fw-bolder" style="color: #d1ba0a; font-size: 20px;">Verduras frescas y llenas
                            de nutrientes para tus platos saludables.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta Hortalizas -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-success">
                    <img src="{{ asset('imagenes/HORTALIZAS2-HTML.jpg') }}" class="card-img-top" alt="Hortalizas">
                    <div class="card-body">
                        <h4 class="text-center fw-bolder" style="color: #0aca1d; font-size: 30px;">Hortalizas</h4>
                        <p class="text-center fw-bolder" style="color: #0aca1d; font-size: 20px;">Hortalizas frescas,
                            perfectas para complementar tus comidas.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-4">
                <a href="{{ route('register') }}" class="btn btn-warning"
                    style= "font-weight: bold; font-size: 20px; border: 4px solid #989302d6; color: #932e02;">
                    Crear cuenta
                </a>
            </div>
        </div>
    </div>


    <!-- Seccion Contactanos-->
    <div class="row justify-content-center contactanos"
        style="background-color: #0bc026; max-height: 700px; overflow: hidden;">
        <div class="col-md-7">
            <div>
                <br>
                <br>
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <h1 class="text-rigth fw-bolder" style="color: #f6f2f2fa; font-size: 50px;">¡Contáctanos!</h1>
                    </blockquote>
                    <br>
                </figure>
                <div class="col-12 text-center">
                    <img src="{{ asset('imagenes/LOGO FRUVER.png') }}" alt="Imagen de contacto"
                        class="img-fluid mx-auto d-block" style="height: 270px; padding: 3px;">
                </div>
            </div>

            <!-- Sección de contacto -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h3 class="text-rigth fw-bolder" style="color: #eff7f1fa; font-size: 25px;">Si tienes alguna duda o
                        inquietud, no dudes en contactarnos.</h3>
                </div>
                <div class="col-12 text-center">
                    <h3 class="text-rigth fw-bolder" style="color: #eff7f1fa; font-size: 38px;">¡Comunícate con nosotros!
                    </h3>

                    <a href="https://wa.me/1234567890" target="_blank" class="btn btn-warning"
                        style= "font-weight: bold; font-size: 18px; border: 4px solid #989302d6; color: #932e02;">
                        Contactar por WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Promociones -->
        <div class="col-md-5">
            <div class="card" style="width: 50rem;">
                <div class="col-4">
                    <div class="card" style="width: 50rem;">
                        <img src="{{ asset('imagenes/PROMOCIONES.png') }}" class="d-block"
                            style="height: 700px; width:87%;" alt="...">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

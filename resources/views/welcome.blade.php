<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Bootstrap Test</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js') <!-- Asegúrate de que esté aquí -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Bootstrap en Laravel</h1>

        <!-- Botón de Bootstrap -->
        <button type="button" class="btn btn-primary mb-3">Botón Primario</button>

        <!-- Alerta de Bootstrap -->
        <div class="alert alert-success" role="alert">
            Esto es una alerta de Bootstrap.
        </div>

        <!-- Tarjeta de Bootstrap -->
        <div class="card" style="width: 18rem;">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Imagen de ejemplo">
            <div class="card-body">
                <h5 class="card-title">Título de la Tarjeta</h5>
                <p class="card-text">Este es un ejemplo de tarjeta de Bootstrap. Puedes agregar contenido aquí.</p>
                <a href="#" class="btn btn-primary">Ir a algún lugar</a>
            </div>
        </div>
    </div>
</body>
</html>


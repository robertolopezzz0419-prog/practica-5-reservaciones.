<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear cuenta</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <div class="contenedor">
        <div class="equipo">

            <h1>Crear cuenta</h1>

            @if($errors->any())
                <p>{{ $errors->first() }}</p>
            @endif

            <form action="{{ url('/registro') }}" method="POST">
                @csrf

                <label>Nombre:</label>
                <input type="text" name="name" required>

                <br><br>

                <label>Correo electrónico:</label>
                <input type="email" name="email" required>

                <br><br>

                <label>Contraseña:</label>
                <input type="password" name="password" required>

                <br><br>

                <label>Confirmar contraseña:</label>
                <input type="password" name="password_confirmation" required>

                <br><br>

                <button type="submit">Registrarse</button>
            </form>

            <p>¿Ya tienes cuenta?</p>
            <a href="{{ url('/login') }}">Iniciar sesión</a>

        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <div class="contenedor">
        <div class="equipo">

            <h1>Iniciar sesión</h1>

            @if(session('mensaje'))
                <p>{{ session('mensaje') }}</p>
            @endif

            @if($errors->any())
                <p>{{ $errors->first() }}</p>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <label>Correo electrónico:</label>
                <input type="email" name="email" required>

                <br><br>

                <label>Contraseña:</label>
                <input type="password" name="password" required>

                <br><br>

                <button type="submit">Entrar</button>
            </form>

            <p>¿No tienes cuenta?</p>
            <a href="{{ url('/registro') }}">Crear cuenta</a>

        </div>
    </div>

</body>
</html>
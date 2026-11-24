
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar equipo</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <div class="contenedor">

        <div class="equipo">

            <h1>Agregar equipo nuevo</h1>

            @if($errors->any())
                <p style="color: red;">{{ $errors->first() }}</p>
            @endif

            <form action="{{ url('/admin/equipos') }}" method="POST">
                @csrf

                <label>Nombre del equipo:</label>
                <input type="text" name="nombre" required>

                <br><br>

                <label>Tipo:</label>
                <input type="text" name="tipo" required>

                <br><br>

                <label>Descripción:</label>
                <input type="text" name="descripcion">

                <br><br>

                <button type="submit">Guardar equipo</button>
            </form>

            <br>

            <a href="{{ url('/admin') }}">Regresar al panel</a>

        </div>

    </div>

</body>
</html>

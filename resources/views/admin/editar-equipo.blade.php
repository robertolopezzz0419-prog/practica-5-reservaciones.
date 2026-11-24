<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar equipo</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <div class="contenedor">
        <div class="equipo">

            <h1>Editar equipo</h1>

            @if($errors->any())
                <p style="color: red;">{{ $errors->first() }}</p>
            @endif

            <form action="{{ url('/admin/equipos/' . $equipo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ $equipo->nombre }}" required>

                <br><br>

                <label>Tipo:</label>
                <input type="text" name="tipo" value="{{ $equipo->tipo }}" required>

                <br><br>

                <label>Descripción:</label>
                <input type="text" name="descripcion" value="{{ $equipo->descripcion }}">

                <br><br>

                <button type="submit">Guardar cambios</button>
            </form>

            <br>

            <a href="{{ url('/admin') }}">Regresar al panel</a>

        </div>
    </div>

</body>
</html>

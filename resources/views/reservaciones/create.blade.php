<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservar equipo</title>

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <div class="contenedor">

        <h1>Reservar equipo</h1>
        @if($errors->any())
    <p style="color: red;">
        {{ $errors->first() }}
    </p>
@endif

        <div class="equipo">

            <h3>{{ $equipo->nombre }}</h3>

            <p>Tipo: {{ $equipo->tipo }}</p>

            <form action="{{ url('/reservaciones') }}" method="POST">

                @csrf

                <input type="hidden" name="equipo_id" value="{{ $equipo->id }}">

                <label>Fecha:</label>
                <input type="date" name="fecha" required>

                <br><br>

                <label>Hora de inicio:</label>
                <input type="time" name="hora_inicio" required>

                <br><br>

                <label>Hora de finalización:</label>
                <input type="time" name="hora_fin" required>

                <br><br>

                <button type="submit">Reservar equipo</button>

            </form>

        </div>

        <a href="{{ url('/equipos') }}">Regresar a equipos</a>

    </div>

</body>
</html>
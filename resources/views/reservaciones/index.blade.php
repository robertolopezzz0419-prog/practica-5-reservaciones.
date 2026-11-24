<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis reservaciones</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <div class="contenedor">

        <h1>Mis reservaciones</h1>

        @if($reservaciones->isEmpty())
            <p>No tienes reservaciones todavía.</p>
        @else

            @foreach($reservaciones as $reservacion)

                <div class="equipo">

                    <h3>{{ $reservacion->equipo->nombre }}</h3>

                    <p>Fecha: {{ $reservacion->fecha }}</p>

                    <p>Hora de inicio: {{ $reservacion->hora_inicio }}</p>

                    <p>Hora de finalización: {{ $reservacion->hora_fin }}</p>

                    <p>Estado: {{ $reservacion->estado }}</p>

                </div>

            @endforeach

        @endif

        <a href="{{ url('/equipos') }}">Regresar a equipos</a>

    </div>

</body>
</html>

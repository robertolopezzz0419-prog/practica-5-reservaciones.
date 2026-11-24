<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
        <title>Equipos disponibles</title>

        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        </head>
        <body>

            <div class="contenedor">

                <h1>Equipos de cómputo</h1>
                <p>
    <a href="{{ url('/mis-reservaciones') }}">Ver mis reservaciones</a>
</p>

<form action="{{ url('/logout') }}" method="POST">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>
                @if(session('mensaje'))
        <p class="disponible">{{ session('mensaje') }}</p>
    @endif

    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

                @foreach($equipos as $equipo)
                    <div class="equipo">

                        <h3>{{ $equipo->nombre }}</h3>

                        <p>Tipo: {{ $equipo->tipo }}</p>

                        <p>{{ $equipo->descripcion }}</p>

                        @if($equipo->disponible)
                            <p class="disponible">Disponible</p>
                        @else
                            <p>No disponible</p>
                        @endif
                        @if($equipo->disponible)
            <a href="{{ url('/reservaciones/'.$equipo->id) }}">
                <button type="button">Reservar equipo</button>
            </a>
        @endif

                    </div>
                @endforeach

            </div>

        </body>
        </html>
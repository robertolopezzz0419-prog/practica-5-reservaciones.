<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de administrador</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <div class="contenedor">

        <h1>Panel de administrador</h1>
        @if(session('mensaje'))
    <p style="color: green;">
        {{ session('mensaje') }}
    </p>
@endif

        <p>Bienvenido, administrador.</p>

        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>

        <h2>Equipos registrados</h2>
        <a href="{{ url('/admin/equipos/crear') }}">
    <button type="button">Agregar equipo</button>
</a>

       
@foreach($equipos as $equipo)
    <div class="equipo">
        <h3>{{ $equipo->nombre }}</h3>
        <p>Tipo: {{ $equipo->tipo }}</p>
        <p>{{ $equipo->descripcion }}</p>

        <a href="{{ url('/admin/equipos/' . $equipo->id . '/editar') }}">
            <button type="button">Editar</button>
        </a>

        <form action="{{ url('/admin/equipos/' . $equipo->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este equipo?')">
                Eliminar
            </button>
        </form>
    </div>
@endforeach


        <h2>Todas las reservaciones</h2>

        @forelse($reservaciones as $reservacion)
    <div class="equipo">
        <h3>{{ $reservacion->equipo->nombre }}</h3>
        <p>Usuario: {{ $reservacion->usuario ? $reservacion->usuario->name : 'Usuario no encontrado' }}</p>
        <p>Fecha: {{ $reservacion->fecha }}</p>
        <p>Horario: {{ $reservacion->hora_inicio }} a {{ $reservacion->hora_fin }}</p>
        <p>Estado: {{ $reservacion->estado }}</p>
    </div>
@empty
    <p>No hay reservaciones registradas.</p>
@endforelse

    </div>

</body>
</html>

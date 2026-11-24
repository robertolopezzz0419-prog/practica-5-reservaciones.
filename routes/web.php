<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Página principal
Route::get('/', function () {
    return redirect('/login');
});

// Registro
Route::get('/registro', [AuthController::class, 'registro']);
Route::post('/registro', [AuthController::class, 'guardarRegistro']);

// Inicio de sesión
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'iniciarSesion']);

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'cerrarSesion']);

// Equipos
Route::get('/equipos', [EquipoController::class, 'index'])->middleware('auth');

// Reservaciones
Route::get('/reservaciones/{equipo}', [ReservacionController::class, 'create'])->middleware('auth');
Route::post('/reservaciones', [ReservacionController::class, 'store'])->middleware('auth');
Route::get('/mis-reservaciones', [ReservacionController::class, 'index'])->middleware('auth');

// Panel del administrador
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin']);

// Agregar equipos (solo administrador)
Route::get('/admin/equipos/crear', [EquipoController::class, 'create'])->middleware(['auth', 'admin']);

Route::post('/admin/equipos', [EquipoController::class, 'store'])->middleware(['auth', 'admin']);

// Editar equipos
Route::get('/admin/equipos/{id}/editar', [EquipoController::class, 'edit'])
    ->middleware(['auth', 'admin']);

Route::put('/admin/equipos/{id}', [EquipoController::class, 'update'])
    ->middleware(['auth', 'admin']);

// Eliminar equipos
Route::delete('/admin/equipos/{id}', [EquipoController::class, 'destroy'])
    ->middleware(['auth', 'admin']);
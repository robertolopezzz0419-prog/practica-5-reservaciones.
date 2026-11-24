<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Reservacion;

class AdminController extends Controller
{
    // Mostrar el panel del administrador
    public function index()
    {
        $equipos = Equipo::all();

        $reservaciones = Reservacion::with(['equipo', 'usuario'])->get();

        return view('admin.index', compact('equipos', 'reservaciones'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservacionController extends Controller
{
    // Mostrar el formulario de reservación
    public function create($equipo)
    {
        $equipo = Equipo::findOrFail($equipo);

        return view('reservaciones.create', compact('equipo'));
    }

    // Guardar una nueva reservación
    public function store(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
        ]);

        try {
            DB::transaction(function () use ($request) {

                // Bloquear el equipo mientras se realiza la reservación
                $equipo = Equipo::where('id', $request->equipo_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                // Comprobar si el horario ya está ocupado
                $ocupado = Reservacion::where('equipo_id', $equipo->id)
                    ->where('fecha', $request->fecha)
                    ->where('estado', '!=', 'cancelada')
                    ->where('hora_inicio', '<', $request->hora_fin)
                    ->where('hora_fin', '>', $request->hora_inicio)
                    ->exists();

                if ($ocupado) {
                    throw new \Exception(
                        'El equipo ya está reservado en ese horario.'
                    );
                }

                // Registrar la reservación
                Reservacion::create([
                    'user_id' => auth()->id(),
                    'equipo_id' => $equipo->id,
                    'fecha' => $request->fecha,
                    'hora_inicio' => $request->hora_inicio,
                    'hora_fin' => $request->hora_fin,
                    'estado' => 'pendiente',
                ]);
            });

        } catch (\Exception $e) {

            return back()->withErrors([
                'fecha' => $e->getMessage(),
            ])->withInput();
        }

        return redirect('/equipos')->with(
            'mensaje',
            'Reservación realizada correctamente'
        );
    }

    // Mostrar las reservaciones del usuario
    public function index()
    {
        $reservaciones = Reservacion::with('equipo')
            ->where('user_id', auth()->id())
            ->get();

        return view('reservaciones.index', compact('reservaciones'));
    }
}

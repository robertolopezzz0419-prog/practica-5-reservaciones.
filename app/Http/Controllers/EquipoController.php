<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // Mostrar equipos
    public function index()
    {
        $equipos = Equipo::all();

        return view('equipos.index', compact('equipos'));
    }

    // Mostrar formulario para agregar equipo
    public function create()
    {
        return view('admin.crear-equipo');
    }

    // Guardar equipo nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'descripcion' => 'nullable',
        ]);

        Equipo::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'disponible' => true,
        ]);

        return redirect('/admin')->with('mensaje', 'Equipo agregado correctamente');
    }

    // Mostrar formulario para editar equipo
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);

        return view('admin.editar-equipo', compact('equipo'));
    }

    // Actualizar equipo
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'descripcion' => 'nullable',
        ]);

        $equipo = Equipo::findOrFail($id);

        $equipo->update($request->only([
            'nombre',
            'tipo',
            'descripcion'
        ]));

        return redirect('/admin')->with('mensaje', 'Equipo actualizado correctamente');
    }

    // Eliminar equipo
    public function destroy($id)
{
    $equipo = Equipo::findOrFail($id);

    if ($equipo->reservaciones()->exists()) {
        return redirect('/admin')->with('mensaje', 'No se puede eliminar porque tiene reservaciones registradas.');
    }

    $equipo->delete();

    return redirect('/admin')->with('mensaje', 'Equipo eliminado correctamente');
}
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function registro()
    {
        return view('auth.registro');
    }

    // Registrar usuario
    public function guardarRegistro(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'estudiante',
        ]);

        return redirect('/login')->with('mensaje', 'Cuenta creada correctamente');
    }

    // Mostrar formulario de inicio de sesión
    public function login()
    {
        return view('auth.login');
    }

    // Comprobar acceso
    public function iniciarSesion(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credenciales)) {
    $request->session()->regenerate();

    if (auth()->user()->rol == 'admin') {
        return redirect('/admin');
    }

    return redirect('/equipos');
}
        return back()->withErrors([
            'email' => 'Los datos son incorrectos.',
        ]);
    }

    // Cerrar sesión
    public function cerrarSesion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
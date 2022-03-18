<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Intenta logear al usuario contra la base de datos
     *
     * @param  Request $request Datos del usuario
     * @return redirect Redirige al usuario a la ruta "/" o a la ruta anterior con errores
     */
    public function authenticate(Request $request)
    {
        // Validadores del lado del servidor
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        // Si consigue logear al usuario regenera la sesión
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        // Si no consigue logear al usuario retorna un error
        return back()->withErrors([
            'email' => 'Correo o contraseña no válidos',
        ]);
    }

    /**
     * Cierra la sesión del usuario activo
     *
     * @param  Request $request Datos del usuario
     * @return redirect Redirige al usuario a la ruta "/"
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

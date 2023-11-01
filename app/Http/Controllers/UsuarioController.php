<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::where('is_admin', false)->where('is_publisher', false)->orderBy('apellido')->orderBy('nombre')->paginate(8);
        return view('usuarios.index', compact('usuarios'));
    }

    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }

    public function verificar(Request $request, User $usuario)
    {
        $usuario->update([
            'is_publisher' => true,
        ]);
        return redirect()->route('usuarios.index')->with('success', 'Usuario verificado exitosamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::where('is_admin', false)->
            where('is_publisher', false)->
            orderBy('apellido')->
            orderBy('nombre')->
            paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function verificado(Request $request, User $usuario)
    {
        $usuario->is_publisher = true;
        $usuario->mensaje = "Ya podés publicar en ";
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success', 'Usuario verificado');
    }

    public function destroy(User $usuario){
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('exito',"El usuario $usuario->nombre fue eliminado con exito!");
    }
}

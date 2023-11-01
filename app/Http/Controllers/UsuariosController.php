<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
    public function verificado(User $usuario){
        $usuario->is_publisher=true;
        $usuario->mensaje='Usted ya es publicador';
        $usuario->save();
        return redirect()->route('usuarios.index')->with('exito',"El usuario $usuario->nombre fue verificado.");
    }
}

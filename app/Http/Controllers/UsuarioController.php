<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::where('es_admininstrador', false)->
            where('es_publicador', false)->
            orderBy('apellido')->
            orderBy('nombre')->
            paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }
    public function destroy(User $usuario){
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success',"El usuario $usuario->nombre fue eliminado.");
    }
    public function verificado(User $usuario){
        $usuario->es_publicador=true;
        $usuario->mensaje='Usted ya es publicador';
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success',"El usuario $usuario->nombre fue verificado.");
    }
}

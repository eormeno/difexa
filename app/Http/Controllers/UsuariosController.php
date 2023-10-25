<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::whare('is_admin', false)-> 
        where('is_publisher',false)->
        orderby('apellido')->
        orderby('nombre')->
        paginate(10);
        return view('usuarios.index', compact('usuarios'));


    }

    public function verificado(Request $request, User $usuario)
    {
        $usuario->is_publisher = true;
        $usuario -> mensaje = 'Ya podes publicar en';
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success','Usuario verificado');

    }
}

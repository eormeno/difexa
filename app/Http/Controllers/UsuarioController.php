<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\Tema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $publicaciones = auth()->user()->publicaciones()->paginate(10);
        $publicaciones=auth()->user()->publicaciones()->orderBy('updated_at','desc')->paginate(10);

        return view('publicaciones.index', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $atributos= $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'contenido' => 'required',
            'imagen' => 'required|image|mimes:png,jpeg,jpg,gif|max:2048',
            'desde' => 'required|date|after:now',
            'hasta' => 'required |date|after:desde'
           ]);
           $atributos['imagen']='imagen';

           $user=User::find(Auth::id());
           $atributos['user_id']=$user->id;
           $atributos['tema_id']=$user->tema_id;
           $publicacion=Publicacion::create($atributos);
           $publicacion->save();
                      
           return redirect()->route('publicaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicacion $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publicacion = Publicacion::find($id);
        return view('publicaciones.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publicaciones_validadas = $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'contenido' => 'required',
            'desde' => 'required|date|after:now',
            'hasta' => 'required |date|after:desde'
           ]);
           
           $publicacion = Publicacion::find($id);
           /////////////////////////////////////////////////
           $publicacion->update($publicaciones_validadas);
           //Lo de arriba puede simplificar todo lo de abajo//

          /* $publicacion->titulo = $publicaciones_validadas['titulo'];
           $publicacion->contenido = $publicaciones_validadas['contenido'];
           $publicacion->desde= $publicaciones_validadas['desde'];
           $publicacion->desde= $publicaciones_validadas['hasta'];
           $publicacion->save();*/
           return redirect()->route('publicaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicacion $publicacion)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = auth()->user()->publicaciones()->latest()->paginate(8);
        return view('publicaciones.index', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $publicacion = Publicacion::find($id);
        return view('publicaciones.show', compact('publicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publicacion = Publicacion::find($id);
        return view('publicaciones.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $publicacion_validada = $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'contenido' => 'required | min:10 | max:255',
            'desde' => 'required | date | before:hasta' ,
            'hasta' => 'required | date | after:desde',
        ]);
        $publicacion = Publicacion::find($id);
        $publicacion->update($publicacion_validada);
        // $publicacion->titulo = $publicacion_validada['titulo'];
        // $publicacion->contenido = $publicacion_validada['contenido'];
        // $publicacion->desde = $publicacion_validada['desde'];
        // $publicacion->hasta = $publicacion_validada['hasta'];
        // $publicacion->save();
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

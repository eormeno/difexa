<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = auth()->user()->publicaciones()->paginate(10);

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
        $publicacion = Publicacion::findOrFail($id);
        return view('publicaciones.show', compact('publicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publicacion=Publicacion::find($id);
        return view('publicaciones.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $validated = $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'contenido' => 'required | min:10 | max:255',
            'desde' => 'required | date |after:now',
            'hasta'=> 'required | date | after:desde',
           ]);
           $publicacion = Publicacion::find($id);
           $publicacion->titulo = $validated['titulo'];
           $publicacion->contenido = $validated['contenido'];
           $publicacion->desde = $validated['desde'];
           $publicacion->hasta = $validated['hasta'];
           $publicacion->save();
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

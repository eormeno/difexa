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
        $publicaciones = auth()->user()->publicaciones()->orderBy('updated_at', 'desc')->paginate(10);
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
        $publicacion_validada = $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'desde' => 'required|date|after:now',
            'hasta' => 'required|date|after:desde',
        ]);
        $publicacion = new Publicacion();
        $publicacion->titulo = $publicacion_validada['titulo'];
        $publicacion->contenido = $publicacion_validada['contenido'];
        $publicacion->imagen = "";
        $publicacion->desde = $publicacion_validada['desde'];
        $publicacion->hasta = $publicacion_validada['hasta'];
        $publicacion->user_id = auth()->user()->id;
        $publicacion->tema_id = auth()->user()->tema_id;
        $publicacion->save();
        return redirect()->route('publicaciones.index') -> with('success', "$publicacion->titulo creado exitosamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publicacion = Publicacion::findOrFail($id);
        return view('publicaciones.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publicacion_validada = $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'desde' => 'required|date|after:now',
            'hasta' => 'required|date|after:desde',
        ]);
        $publicacion = Publicacion::find($id);
        $publicacion->update($publicacion_validada);
        return redirect()->route('publicaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

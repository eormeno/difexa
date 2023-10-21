<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::Orderby('updated_at', 'desc')->paginate(8);
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
            'titulo' => 'required | min:3 | max:50',
            'contenido' => 'required | min:10 | max:255',
            'desde' => 'required | date | before:hasta' ,
            'hasta' => 'required | date | after:desde',
        ]);
        $titulo = $publicacion_validada['titulo'];
        $publicacion_validada['imagen'] = 'https://via.placeholder.com/640x480.png/0077ff?text=eius';
        $publicacion_validada['user_id'] = auth()->user()->id;
        $publicacion_validada['tema_id'] = auth()->user()->tema_id;
        Publicacion::create($publicacion_validada);
        return redirect()->route('publicaciones.index') -> with('success', "$titulo creada exitosamente");
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
        $titulo = $publicacion_validada['titulo'];
        $publicacion = Publicacion::find($id);
        $publicacion->update($publicacion_validada);
        return redirect()->route('publicaciones.index')->with('success', "$titulo actualizada exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicacion $publicacion)
    {
        //
    }
}

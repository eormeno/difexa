<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

class TemasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temas = Tema::orderBy('updated_at', 'desc')->where('deleted', false)->paginate(10);      
        return view('temas.index', compact('temas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('temas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tema_validado = $request->validate([
            'titulo' => 'required|min:3|max:50|unique:temas,titulo',
            'descripcion' => 'required|min:10|max:255',
            'slug' => 'required|min:3|max:50|unique:temas,slug',
        ]);
        Tema::create($tema_validado);
        return redirect()->route('temas.index') -> with('success', 'Tema creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tema = Tema::find($id);
        return view('temas.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'titulo' => 'required | min:3 | max:50' ,
            'descripcion' => 'required | min:12 | max:200',
            'slug' => 'required | unique:temas,slug,' . $id . ' | min:3 | max:30' . $id
        ]);
        $tema = Tema::find($id);
        $tema->titulo = $validated['titulo'];
        $tema->descripcion = $validated['descripcion'];
        $tema->slug = $validated['slug'];
        $tema->save();
        return redirect()->route('temas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        $tema->deleted = true;
        $tema->save();
        return redirect()->route('temas.index');
    }
}
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
        $temas = Tema::orderBy('updated_at', 'desc')->paginate(10);
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
        $temas_validados = $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
            'slug' => 'required | unique:temas,slug | min:3 | max:50',
        ]);
        $tema = new Tema();
        $tema->titulo = $temas_validados['titulo'];
        $tema->descripcion = $temas_validados['descripcion'];
        $tema->slug = $temas_validados['slug'];
        $tema->save();
        return redirect()->route('temas.index');
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
        $tema = Tema::find($id);
        return view('temas.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $temas_validados = $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
            'slug' => 'required | unique:temas,slug,' . $id . ' | min:3 | max:50',
        ]);
        $tema = Tema::find($id);
        $tema->titulo = $temas_validados['titulo'];
        $tema->descripcion = $temas_validados['descripcion'];
        $tema->slug = $temas_validados['slug'];
        $tema->save();
        return redirect()->route('temas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

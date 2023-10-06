<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temas = Tema::paginate(8);
        return view('temas.index', compact('temas'));
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
        $tema = Tema::find($id);
        return view('temas.show', compact('tema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tema = Tema::find($id);
        return view('temas.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tema_validado = $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
            'slug' => 'required | unique:temas,slug,' . $id . ' | min:3 | max:50',
        ]);
        $tema = Tema::find($id);
        $tema->update($tema_validado);
        // $tema->titulo = $tema_validado['titulo'];
        // $tema->descripcion = $tema_validado['descripcion'];
        // $tema->slug = $tema_validado['slug'];
        // $tema->save();
        return redirect()->route('temas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        //
    }
}

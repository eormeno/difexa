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
        $temas = Tema::Orderby('updated_at', 'desc')->paginate(8);
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
    public function store(Request $request, Tema $tema)
    {
        $tema_validado = $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
            'slug' => 'required | unique:temas,slug, ' . $tema . ' | min:3 | max:50',
        ]);
        Tema::create($tema_validado);
        return redirect()->route('temas.index') -> with('success', 'Tema creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tema $tema)
    {
        return view('temas.show', compact('tema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tema $tema)
    {
        return view('temas.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tema $tema)
    {
        $tema_validado = $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
            'slug' => 'required | unique:temas,slug, ' . $tema->saveQuietly . ' | min:3 | max:50',
        ]);
        $tema->update($tema_validado);
        return redirect()->route('temas.index') -> with('success', 'Tema actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        $tema->delete();
        return redirect()->route('temas.index') -> with('success', 'Tema eliminado exitosamente');
    }
}

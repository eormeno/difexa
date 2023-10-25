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
        $temas = Tema::where('delete', false)->paginate(10);

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
    public function show(string $id)
    {
        $tema = Tema::find($id);

        return response()->json($tema);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tema = Tema::find($id);
        return view('temas.edit', compact('temas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $temas_validados = $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'descripcion' => 'required',
            'slug' => 'required | unique:temas,slug,' .$id. ' | min:3 | max:50'
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
    public function destroy(Tema $tema)
    {
        $tema->delete = true;
        $tema->save();
        return redirect()->route('temas.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class TemasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temas= Tema::paginate(10);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tema=Tema::find($id);
        return view('temas.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $temasValidados= $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'slug' => 'required | min:3 | max:50 | unique:temas,slug,'.$id,
            'descripcion' => 'required | min:10 | max:255',
        ]);
        $tema=Tema::find($id);
        $tema->titulo=$temasValidados['titulo'];
        $tema->descripcion=$temasValidados['descripcion'];
        $tema->slug=$request->$temasValidados['slug'];
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

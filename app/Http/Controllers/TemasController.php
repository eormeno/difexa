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
            'slug' => 'required | min:3 | max:50 |unique:temas,slug,',
        ]);
        $tema=Tema::create($temas_validados);
        $tema->save();
        return redirect()->route('temas.index')->with('exito',"Se creo el tema $tema->titulo correctamente.");
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
    public function edit(Tema $tema)
    {
        return view('temas.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tema $tema)
    {
        $temasValidados= $request->validate([
            'titulo' => 'required | min:3 | max:50',
            'slug' => 'required | min:3 | max:50 | unique:temas,slug,'.$tema->id,
            'descripcion' => 'required | min:10 | max:255',
        ]);
        $tema->titulo=$temasValidados['titulo'];
        $tema->descripcion=$temasValidados['descripcion'];
        $tema->slug=$temasValidados['slug'];
        $tema->save();
        return redirect()->route('temas.index')->with('exito',"Se actualizo el tema $tema->titulo correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        //
    }
}

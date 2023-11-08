<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;
use App\Models\Tema;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispositivos = Dispositivo::orderBy('updated_at','desc')->paginate(8);

        return view('dispositivos.index', compact('dispositivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $temas = Tema::all();
        return view('dispositivos.create',compact('temas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
            'tema' => 'required | nullable | exists:temas,id'
        ]);
        $dispositivo = Dispositivo::create($validated);
        $dispositivo->temas()->attach([$validated['tema']]);
        return redirect()->route('dispositivos.index') -> with('success', 'Dispositivo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dispositivo $dispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dispositivo=Dispositivo::find($id);
        $temas = Tema::all();
        $temasDisponibles = $temas->diff($dispositivo->temas);
        return view('dispositivos.edit', compact('dispositivo','temasDisponibles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
            'tema_nuevo' => 'nullable|exists:temas,id'
           ]);
        $dispositivo = Dispositivo::find($id);
        $dispositivo->nombre = $validated['nombre'];
        $dispositivo->descripcion = $validated['descripcion'];
        $dispositivo->save();
        if ($request->has('temas_desvincular')) {
            $temasDesvincular = $request->input('temas_desvincular', []);
            $dispositivo->temas()->detach($temasDesvincular);
        }
    
        if ($request->has('tema_nuevo') and $validated['tema_nuevo']!=null) {
            $dispositivo->temas()->attach([$validated['tema_nuevo']]);
        }
           return redirect()->route('dispositivos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispositivo $dispositivo)
    {
        $dispositivo->delete();
        return redirect()->route('dispositivos.index');
    }
}

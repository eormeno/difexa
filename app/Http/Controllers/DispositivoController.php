<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispositivos = Dispositivo::orderBy('created_at', 'desc')->paginate(10);
        return view('dispositivos.index', compact('dispositivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dispositivos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:3 | max:1000',
        ]);
        Dispositivo::create($validated);
        return redirect()->route('dispositivos.index');
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
    public function edit(Dispositivo $dispositivo)
    {
        $temas = Tema::orderBy('created_at', 'desc');
        return view('dispositivos.edit', compact('dispositivo', 'temas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispositivo $dispositivo)
    {
        $validated = $request->validate([
            'nombre' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:3 | max:1000',
        ]);
        $dispositivo->update($validated);
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

<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispositivos = Dispositivo::Orderby('updated_at', 'desc')->paginate(8);
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
        $dispositivo_validado = $request->validate([
            'nombre' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
        ]);
        Dispositivo::create($dispositivo_validado);
        return redirect()->route('dispositivos.index') -> with('success', 'Dispositivo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dispositivo = Dispositivo::find($id);
        return view('dispositivos.show', compact('dispositivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dispositivo = Dispositivo::find($id);
        return view('dispositivos.edit', compact('dispositivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $dispositivo_validado = $request->validate([
            'nombre' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
        ]);
        $dispositivo = Dispositivo::find($id);
        $dispositivo->update($dispositivo_validado);
        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispositivo $dispositivo)
    {
        //
    }
}

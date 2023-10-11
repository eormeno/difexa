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
        $dispositivos= Dispositivo::paginate(8);
        return view('dispositivos.index', compact('dispositivos'));
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
        return view('dispositivos.edit', compact('dispositivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dispositivosValidados= $request->validate([
            'nombre' => 'required | min:3 | max:50',
            'descripcion' => 'required | min:10 | max:255',
        ]);
        $dispositivo=Dispositivo::find($id);
        $dispositivo->nombre=$dispositivosValidados['nombre'];
        $dispositivo->descripcion=$dispositivosValidados['descripcion'];
        $dispositivo->save();
        return redirect()->route('dispositivos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispositivo $dispositivo)
    {
        //
    }
}

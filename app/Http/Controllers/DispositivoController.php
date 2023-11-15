<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $dispositivo=Dispositivo::create($validated);
        return redirect()->route('dispositivos.index')->with('exito',"Se creo el dispositivo $dispositivo->nombre correctamente.");;
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
        $temas = Tema::all();
        $temasDisponibles = $temas->diff($dispositivo->temas);
        return view('dispositivos.edit', compact('dispositivo','temasDisponibles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispositivo $dispositivo)
    {
        $dispositivos_validados = $request->validate([
            'nombre' => 'required | min:3 | max:50',
            'descripcion' => 'required| min:10|max:255',
           ]);

           
           $dispositivo->nombre = $dispositivos_validados['nombre'];
           $dispositivo->descripcion = $dispositivos_validados['descripcion'];
           $dispositivo->save();


           if($request->input('boton')=='Eliminar'){
            $temasSeleccionados = $request->input('temas', []);
            $dispositivo->temas()->detach($temasSeleccionados);
        }
        elseif ($request->input('boton')=='Agregar'){
            if ($request['tema'])
            {
                $tema=Tema::find($request['tema']);
                if (!$dispositivo->temas->contains($tema->id)) {
                    $dispositivo->temas()->attach($tema->id);
                }
            }
        }

           return redirect()->route('dispositivos.index')->with('exito',"Se actualizo el dispositivo $dispositivo->nombre correctamente."); 
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

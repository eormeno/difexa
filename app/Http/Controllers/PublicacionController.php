<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::Orderby('updated_at', 'desc')->paginate(8);
        return view('publicaciones.index', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $atributos=request()->validate([
            'titulo' => 'required | min:3 | max:50',
            'contenido' => 'required | min:3 | max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif | max:2048',
            'desde' => 'required | date | after:now',
            'hasta' => 'required | date | after:desde',
        ]);

        $rutaImagen = $request->file('imagen')->getRealPath();
        $atributos['imagen']=base64_encode(file_get_contents($rutaImagen));

        $user=User::find(Auth::id());
        $atributos['user_id']=$user->id;
        $atributos['tema_id']=$user->tema_id;
        Publicacion::create($atributos);
        return redirect()->route('publicaciones.index')->with('success', 'Publicación creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicacion $publicacion)
    {
        return view('publicaciones.show', compact('publicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicacion $publicacion)
    {
        return view('publicaciones.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $validaciones=[
            'titulo' => 'required | min:3 | max:50',
            'contenido' => 'required | min:3 | max:255',
            'desde' => 'required | date | after:now',
            'hasta' => 'required | date | after:desde',
        ];
        if ($request->hasFile('imagen')) {
            $validaciones['imagen'] = 'image|mimes:jpeg,png|max:2048';
            $atributos=$request->validate($validaciones);
            $rutaImagen = $request->file('imagen')->getRealPath();
            $atributos['imagen']=base64_encode(file_get_contents($rutaImagen));
        }
        else{
            $atributos=$request->validate($validaciones);
        }

        $publicacion=Publicacion::find($id);
        $publicacion->update($atributos);
           return redirect()->route('publicaciones.index')->with('success', 'Publicación modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicacion $publicacion)
    {
         $publicacion->delete();
        return redirect()->route('publicaciones.index')->with('exito',"Se elimino la publicación $publicacion->titulo correctamente.");
    }
}

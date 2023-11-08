<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Tema;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $temas=Tema::all();
        return view('profile.edit', [
            'user' => $request->user(),
            'temas' => $temas
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $user=$request->user();

        $request->user()->save();

        $p=[];
        $p['status']='profile-updated';
        if ($request['tema']!=$user->tema->id and $user->is_publisher==True){
            $tema = Tema::find($request['tema']);
            $p['nuevoTema']=$tema;
        }
        return Redirect::route('profile.edit')->with($p);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function cambiarTema(Request $request,Tema $tema){
        $usuario = $request->user();
        $usuario->tema_id=$tema->id;
        $usuario->is_publisher=false;
        $mensaje = ' Tu usuario es: ' . $usuario->email . "\n";
        $mensaje .= 'Para verificarte, debes asistir con tu documento al área de comunicación de la FCEFN';
        $usuario->mensaje=$mensaje;
        $usuario->save();
        return Redirect::to('/dashboard');
    }
}

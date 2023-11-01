<?php

namespace App\Http\Controllers\Auth;

use App\Models\Tema;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $temas = Tema::all();
        return view('auth.register', compact('temas'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'apellido' => ['required', 'string', 'max:15', 'min:2'],
            'nombre' => ['required', 'string', 'max:25', 'min:2'],
            'documento' => ['required', 'string', 'regex:/^[0-9]+$/', 'max:12', 'min:6'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'tema' => ['required', 'exists:temas,id'],
            'password' => ['required', 'confirmed', 'min:3', 'max:10'],
        ]);

        $mensaje='¡Bienvenido a la comunidad de '. config('app.name').'!';
        $mensaje.='Su usuario es'.$request->email."\n";
        $mensaje.='Para verificarte, debes asistir con tu documento al área de comunicacion de la FCEFyN.';

        $user = User::create([
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
            'documento' => $request->documento,
            'email' => $request->email,
            'mensaje' => $mensaje,
            'password' => Hash::make($request->password),
        ]);

        $user->tema()->associate($request->tema);

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

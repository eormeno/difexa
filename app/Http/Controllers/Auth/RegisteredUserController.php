<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
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

        $user = User::create([
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
            'documento' => $request->documento,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->tema()->associate($request->tema);

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\PublicacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/{tema}', [ProfileController::class, 'cambiarTema'])->name('profile.cambiarTema');
});

Route::middleware(['auth', 'es_admininstrador'])->group(function() {
    Route::get('/tema', [TemasController::class, 'index'])->name('tema.index');
    Route::get('/tema/create', [TemasController::class, 'create'])->name('tema.create');
    Route::post('/tema', [TemasController::class, 'store'])->name('tema.store');
    Route::get('/tema/{id}', [TemasController::class, 'edit'])->name('tema.edit');
    Route::patch('/tema/{id}', [TemasController::class, 'update'])->name('tema.update');
    Route::delete('/tema/{tema}',[TemasController::class, 'destroy'])->name('tema.destroy');
    Route::get('/dispositivo', [DispositivoController::class, 'index'])->name('dispositivo.index');
    Route::get('/dispositivo/create', [DispositivoController::class, 'create'])->name('dispositivo.create');
    Route::post('/dispositivo', [DispositivoController::class, 'store'])->name('dispositivo.store');
    Route::get('/dispositivo/{dispositivo}', [DispositivoController::class, 'edit'])->name('dispositivo.edit');
    Route::patch('/dispositivo/{dispositivo}', [DispositivoController::class, 'update'])->name('dispositivo.update');
    Route::delete('/dispositivo/{dispositivo}',[DispositivoController::class, 'destroy'])->name('dispositivo.destroy');
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::patch('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    Route::patch('/usuarios/{usuario}/verificado', [UsuarioController::class, 'verificado'])->name('usuarios.verificado');
});

Route::middleware(['auth', 'es_publicador'])->group(function() {
    Route::get('/publicaciones', [PublicacionController::class, 'index'])->name('publicaciones.index');
    Route::get('/publicaciones/create', [PublicacionController::class, 'create'])->name('publicaciones.create');
    Route::post('/publicaciones', [PublicacionController::class, 'store'])->name('publicaciones.store');
    Route::get('/publicaciones/{id}', [PublicacionController::class, 'edit'])->name('publicaciones.edit');
    Route::patch('/publicaciones/{id}', [PublicacionController::class, 'update'])->name('publicaciones.update');
    Route::delete('/publicaciones/{publicacion}',[PublicacionController::class, 'destroy'])->name('publicaciones.destroy');
});


require __DIR__.'/auth.php';

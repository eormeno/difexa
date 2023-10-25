<?php

use App\Http\Controllers\UsuariosController;
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

    

    
});

Route::middleware(['auth', 'is.admin'])->group(function() {
    Route::get('/temas', [TemasController::class, 'index'])->name('temas.index');
    Route::get('/temas/{id}', [TemasController::class, 'edit'])->name('temas.edit');
    Route::patch('/temas/{id}', [TemasController::class, 'update'])->name('temas.update');

    Route::delete('/temas/{tema}', [TemasController::class,'destroy'])->name('temas.destroy');

    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');


    
    Route::get('/dispositivos', [DispositivoController::class, 'index'])->name('dispositivos.index');
    Route::get('/dispositivos/{id}', [DispositivoController::class, 'edit'])->name('dispositivos.edit');
    Route::patch('/dispositivos/{id}', [DispositivoController::class, 'update'])->name('dispositivos.update');
    Route::delete('/dispositivos/{dispositivo}', [DispositivoController::class, 'destroy'])->name('dispositivos.destroy');
});

Route::middleware(['auth', 'is.publisher'])->group(function()
{
    Route::get('/publicaciones',[PublicacionController::class,'index'])->name('publicaciones.index');
    Route::get('/publicaciones/crear',[PublicacionController::class,'create'])->name('publicaciones.create');
    Route::post('/publicaciones/crear',[PublicacionController::class,'store'])->name('publicaciones.store');
    Route::get('/publicaciones/{id}',[PublicacionController::class,'edit'])->name('publicaciones.edit');
    Route::patch('/publicaciones/{id}',[PublicacionController::class,'update'])->name('publicaciones.update');

    Route::delete('/publicaciones/{publicacion}',[PublicacionController::class, 'destroy'])->name('publicaciones.destroy');
});
require __DIR__ . '/auth.php';

//1ro Creamos la Ruta a CREATE y STORE
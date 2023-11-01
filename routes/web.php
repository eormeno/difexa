<?php

use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemasController;
use Illuminate\Support\Facades\Route;
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

Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get('/temas', [TemasController::class, 'index'])->name('temas.index');
    Route::get('/temas/{id}/edit', [TemasController::class, 'edit'])->name('temas.edit');
    Route::patch('/temas/{id}', [TemasController::class, 'update'])->name('temas.update');
    Route::get('/temas/create', [TemasController::class, 'create'])->name('temas.create');
    Route::post('/temas', [TemasController::class, 'store'])->name('temas.store');

    Route::get('/dispositivos', [DispositivoController::class, 'index'])->name('dispositivos.index');
    Route::get('/dispositivos/{id}', [DispositivoController::class, 'show'])->name('dispositivos.show');
    Route::get('/dispositivos/{id}', [DispositivoController::class, 'edit'])->name('dispositivos.edit');
    Route::patch('/dispositivos/{id}', [DispositivoController::class, 'update'])->name('dispositivos.update');
    Route::delete('/dispositivos/{dispositivo}', [DispositivoController::class, 'destroy'])->name('dispositivos.destroy');
    
});

Route::middleware(['auth','is_publisher'])->group(function () {
    Route::get('/publicaciones', [PublicacionController::class, 'index'])->name('publicaciones.index');
    Route::get('/publicaciones/{id}', [PublicacionController::class, 'show'])->name('publicaciones.show');
    Route::get('/publicaciones/{id}', [PublicacionController::class, 'edit'])->name('publicaciones.edit');
    Route::patch('/publicaciones/{id}', [PublicacionController::class, 'update'])->name('publicaciones.update');
});

Route::resource('temas', TemasController::class)->middleware(['auth', 'is_admin'])->name('index', 'temas.index');

Route::resource('dispositivos', DispositivoController::class)->middleware(['auth', 'is_admin'])->name('index', 'dispositivos.index');

Route::resource('publicaciones', PublicacionController::class)->middleware(['auth', 'is_publisher'])->name('index', 'publicaciones.index');

require __DIR__.'/auth.php';

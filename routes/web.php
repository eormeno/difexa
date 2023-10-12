<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemaController;
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
    Route::get('/temas', [TemaController::class, 'index'])->name('temas.index');
    Route::get('/temas/create', [TemaController::class, 'create'])->name('temas.create');
    Route::post('/temas', [TemaController::class, 'store'])->name('temas.store');
    Route::get('/temas/{id}', [TemaController::class, 'show'])->name('temas.show');
    Route::get('/temas/{id}/edit', [TemaController::class, 'edit'])->name('temas.edit');
    Route::patch('/temas/{id}', [TemaController::class, 'update'])->name('temas.update');

    Route::get('/dispositivos', [DispositivoController::class, 'index'])->name('dispositivos.index');
    Route::get('/dispositivos/create', [DispositivoController::class, 'create'])->name('dispositivos.create');
    Route::post('/dispositivos', [DispositivoController::class, 'store'])->name('dispositivos.store');
    Route::get('/dispositivos/{id}', [DispositivoController::class, 'show'])->name('dispositivos.show');
    Route::get('/dispositivos/{id}/edit', [DispositivoController::class, 'edit'])->name('dispositivos.edit');
    Route::patch('/dispositivos/{id}', [DispositivoController::class, 'update'])->name('dispositivos.update');
});

Route::middleware(['auth', 'is.publisher'])->group(function() {
    Route::get('/publicaciones', [PublicacionController::class, 'index'])->name('publicaciones.index');
    Route::get('/publicaciones/create', [PublicacionController::class, 'create'])->name('publicaciones.create');
    Route::post('/publicaciones', [PublicacionController::class, 'store'])->name('publicaciones.store');
    Route::get('/publicaciones/{id}', [PublicacionController::class, 'show'])->name('publicaciones.show');
    Route::get('/publicaciones/{id}/edit', [PublicacionController::class, 'edit'])->name('publicaciones.edit');
    Route::patch('/publicaciones/{id}', [PublicacionController::class, 'update'])->name('publicaciones.update');
});

require __DIR__.'/auth.php';

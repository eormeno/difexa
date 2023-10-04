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
    Route::get('/temas/{id}', [TemaController::class, 'edit'])->name('temas.edit');
    Route::patch('/temas/{id}', [TemaController::class, 'update'])->name('temas.update');
    Route::get('/dispositivos', [DispositivoController::class, 'index'])->name('dispositivos.index');
});

Route::middleware(['auth', 'is.publisher'])->group(function() {
    Route::get('/publicaciones', [PublicacionController::class, 'index'])->name('publicaciones.index');
    Route::get('/publicaciones/{id}', [PublicacionController::class, 'show'])->name('publicaciones.show');
});

require __DIR__.'/auth.php';

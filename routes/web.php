<?php

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

Route::middleware(['auth', 'es_admininstrador'])->group(function() {
    Route::get('/tema', [TemasController::class, 'index'])->name('tema.index');
    Route::get('/tema/{id}', [TemasController::class, 'edit'])->name('tema.edit');
    Route::patch('/tema/{id}', [TemasController::class, 'update'])->name('tema.update');
    Route::get('/dispositivo', [DispositivoController::class, 'index'])->name('dispositivo.index');
    Route::get('/dispositivo/create', [DispositivoController::class, 'create'])->name('dispositivo.create');
    Route::post('/dispositivo', [DispositivoController::class, 'store'])->name('dispositivo.store');
    Route::get('/dispositivo/{dispositivo}', [DispositivoController::class, 'edit'])->name('dispositivo.edit');
    Route::patch('/dispositivo/{dispositivo}', [DispositivoController::class, 'update'])->name('dispositivo.update');
});

Route::middleware(['auth', 'es_publicador'])->group(function() {
    Route::get('/publicaciones', [PublicacionController::class, 'index'])->name('publicaciones.index');
    Route::get('/publicaciones/{id}', [PublicacionController::class, 'edit'])->name('publicaciones.edit');
    Route::patch('/publicaciones/{id}', [PublicacionController::class, 'update'])->name('publicaciones.update');
});


require __DIR__.'/auth.php';

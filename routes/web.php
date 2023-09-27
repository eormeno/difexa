<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemasController;
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

Route::get('/temas', function () {
    return view('temas.index');
})->name('temas');

Route::resource('tema', TemasController::class)->middleware(['auth', 'es_admininstrador'])->name('index', 'tema.index');

Route::resource('dispositivo', DispositivoController::class)->middleware(['auth', 'es_admininstrador'])->name('index', 'dispositivo.index');

Route::resource('publicaciones', PublicacionController::class)->middleware(['auth', 'es_publicador'])->name('index', 'publicaciones.index');

require __DIR__.'/auth.php';

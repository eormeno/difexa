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


Route::resource('temas', TemaController::class)->middleware(['auth', 'is_admin'])->name('index', 'temas.index');

Route::resource('dispositivos', DispositivoController::class)->middleware(['auth', 'is_admin'])->name('index', 'dispositivos.index');

Route::resource('publicaciones', PublicacionController::class)->middleware(['auth', 'is_publisher'])->name('index', 'publicaciones.index');

require __DIR__.'/auth.php';

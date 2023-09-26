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

Route::resource('temas', TemasController::class)->middleware('auth')->name('index', 'temas.index');

Route::resource('dispositivos', DispositivoController::class)->middleware('auth')->name('index', 'dispositivos.index');

Route::resource('publicaciones', PublicacionController::class)->middleware('auth')->name('index', 'publicaciones.index');

require __DIR__.'/auth.php';

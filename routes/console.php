<?php

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/


Artisan::command('fresh', function () {
    // if database is sqlite, delete the database file
    if (config('database.default') === 'sqlite') {
        if (file_exists(database_path('database.sqlite'))) {
            unlink(database_path('database.sqlite'));
        }
        $this->call('migrate', ['--force' => true]);
        $this->call('db:seed');
    }
})->purpose('Actualiza la Base de Datos');

Artisan::command('users', function () {
    $users = User::all(['email', 'is_admin', 'is_publisher'])->toArray();
    $this->table(['email', 'is_admin', 'is_publisher'], $users);
})->purpose('Display users');

Artisan::command('publicaciones', function () {
    $users = Publicacion::all(['id','titulo', 'user_id','tema_id'])->toArray();
    $this->table(['id','titulo', 'user_id','tema_id'], $users);
})->describe('Lista todos las publicaciones');
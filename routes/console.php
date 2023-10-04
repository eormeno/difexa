<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\Tema;

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

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('fresh', function () {
    if (config('database.default') === 'sqlite') {
        if (file_exists(database_path('database.sqlite'))) {
            unlink(database_path('database.sqlite'));
        }
        $this->call('migrate', ['--force' => true]);
        $this->call('db:seed');
    }
})->describe('Fresh database');

Artisan::command('users', function () {
    $users = User::all(['email', 'is_admin', 'is_publisher'])->toArray();
    $this->table(['email', 'is_admin', 'is_publisher'], $users);
})->purpose('Display users');

Artisan::command('temas', function () {
    $temas = Tema::all(['id', 'slug'])->toArray();
    $this->table(['id', 'slug'], $temas);
})->purpose('Display temas');
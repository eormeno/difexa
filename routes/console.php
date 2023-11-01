<?php

use App\Models\Tema;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

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


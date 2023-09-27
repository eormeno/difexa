<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Artisan;


Artisan::command('fresh', function () {
    // if database is sqlite, delete the database file
    if (config('database.default') === 'sqlite') {
        if (file_exists(database_path('database.sqlite'))) {
            unlink(database_path('database.sqlite'));
        }
        $this->call('migrate', ['--force' => true]);
        $this->call('db:seed');
    }
});

Artisan::command('users', function () {
    $users = User::all(['email', 'is_admin', 'is_publisher'])->toArray();
    $this->table(['email', 'is_admin', 'is_publisher'], $users);
})->purpose('Display users');
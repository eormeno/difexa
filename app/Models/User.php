<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Tema;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'tema',
        'email',
        'password',
        'tema_id',
        'is_admin',
        'is_publisher',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function tema()
    {
        return $this->belongsTo(Tema::class);
    }

    public function getFullName()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function isPublisher(): bool
    {
        return $this->is_publisher;
    }

}

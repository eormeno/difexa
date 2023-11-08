<?php

namespace App\Models;

use App\Models\Tema;
use App\Models\Publicacion;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'apellido',
        'nombre',
        'documento',
        'email',
        'password',
        'tema_id',
        'es_admininstrador',
        'es_publicador',
        'mensaje',
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
    public function getFullName(){
        return ucfirst($this->apellido) . ' ' . ucfirst($this->nombre);
    }
    public function publicaciones(){
        return $this->hasMany(Publicacion::class);
    }
    public function tema(){
        return $this->belongsTo(Tema::class);
    }
}

<?php

namespace App\Models;

use App\Models\User;
use App\Models\Dispositivo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tema extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descripcion',
        'slug',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function publicaciones() {
        return $this->hasMany(Publicacion::class);
    }

    public function dispositivos() {
        return $this->belongsToMany(Dispositivo::class, 'dispositivo_tema');
    }
}


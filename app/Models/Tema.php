<?php

namespace App\Models;

use App\Models\User;
use App\Models\Dispositivo;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'slug',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function dispositivos(){
        return $this->belongsToMany(Dispositivo::class,'dispositivos_temas');
    }
    public function publicaciones() {
        return $this->hasMany(Publicacion::class);
    }
}

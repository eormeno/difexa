<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dispositivo;

class Tema extends Model
{
    use HasFactory;
    protected $fillable=[
        'slug',
        'titulo',
        'descripcion',
        'deleted'
    ];
    public function users(){
        return $this->hasMany(User::class);
    }
    
    public function publicaciones(){
        return $this->hasMany(Publicacion::class);
    }

    public function dispositivos(){
        return $this->belongsToMany(Dispositivo::class,'dispositivos_temas');
    }
}
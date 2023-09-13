<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    use HasFactory;

    protected $fillable = [
        'titulo',
        'contenido',
        'imagen',
        'desde',
        'hasta',
        'user_id',
        'tema_id'
    ];
}

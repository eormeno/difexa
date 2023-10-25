<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tema;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';
    
    protected $fillable = [
        'titulo',
        'contenido',
        'imagen',
        'desde',
        'hasta',
        'user_id',
        'tema_id',
        'deleted',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tema() {
        return $this->belongsTo(Tema::class);
    }
}

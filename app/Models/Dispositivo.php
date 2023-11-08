<?php

namespace App\Models;

use App\Models\Tema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dispositivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo'
    ];

    public function temas() {
        return $this->belongsToMany(Tema::class, 'dispositivos_temas');
    }
}

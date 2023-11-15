<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tema;

class Dispositivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
    ];

    public function temas(){
        return $this->belongsToMany(Tema::class,'dispositivos_temas');
    }
}

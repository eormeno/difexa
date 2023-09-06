<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tema extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'slug',
        'titulo',
        'descripcion',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

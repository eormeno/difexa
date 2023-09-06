<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    protected $fillable=[
        'slug',
        'titulo',
        'descripcion'
    ];
    public function users(){
        return $this->hasMany(User::class);
    }
}

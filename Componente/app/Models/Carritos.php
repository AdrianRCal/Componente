<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carritos extends Model
{
    use HasFactory;

    protected $fillable = [
        'idCarrito', 'NombreP', 'Precio', 'idUsuario', 'Imagen', 'Cantidad'
    ];

}

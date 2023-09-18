<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $table = 'asignaturas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre', // Columna "nombre" en la tabla
        'creditos', // Columna "creditos" en la tabla
        // Otras propiedades aquí si es necesario
    ];
}

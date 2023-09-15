<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public $table = 'alumnos';

    public $fillable = [
        'nombre',
        'fecha',
        'activo'
    ];

    protected $casts = [
        'nombre' => 'string',
        'fecha' => 'date',
        'activo' => 'boolean'
    ];

    public static array $rules = [
        'nombre' => 'required'
    ];

    
}

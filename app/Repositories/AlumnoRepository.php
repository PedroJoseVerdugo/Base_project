<?php

namespace App\Repositories;

use App\Models\Alumno;
use App\Repositories\BaseRepository;

class AlumnoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'fecha',
        'activo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Alumno::class;
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAlumnoAPIRequest;
use App\Http\Requests\API\UpdateAlumnoAPIRequest;
use App\Models\Alumno;
use App\Repositories\AlumnoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class AlumnoAPIController
 */
class AlumnoAPIController extends AppBaseController
{
    private AlumnoRepository $alumnoRepository;

    public function __construct(AlumnoRepository $alumnoRepo)
    {
        $this->alumnoRepository = $alumnoRepo;
    }

    /**
     * Display a listing of the Alumnos.
     * GET|HEAD /alumnos
     */
    public function index(Request $request): JsonResponse
    {
        $alumnos = $this->alumnoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($alumnos->toArray(), 'Alumnos retrieved successfully');
    }

    /**
     * Store a newly created Alumno in storage.
     * POST /alumnos
     */
    public function store(CreateAlumnoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $alumno = $this->alumnoRepository->create($input);

        return $this->sendResponse($alumno->toArray(), 'Alumno saved successfully');
    }

    /**
     * Display the specified Alumno.
     * GET|HEAD /alumnos/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Alumno $alumno */
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            return $this->sendError('Alumno not found');
        }

        return $this->sendResponse($alumno->toArray(), 'Alumno retrieved successfully');
    }

    /**
     * Update the specified Alumno in storage.
     * PUT/PATCH /alumnos/{id}
     */
    public function update($id, UpdateAlumnoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Alumno $alumno */
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            return $this->sendError('Alumno not found');
        }

        $alumno = $this->alumnoRepository->update($input, $id);

        return $this->sendResponse($alumno->toArray(), 'Alumno updated successfully');
    }

    /**
     * Remove the specified Alumno from storage.
     * DELETE /alumnos/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Alumno $alumno */
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            return $this->sendError('Alumno not found');
        }

        $alumno->delete();

        return $this->sendSuccess('Alumno deleted successfully');
    }
}

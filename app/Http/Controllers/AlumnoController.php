<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AlumnoRepository;
use Illuminate\Http\Request;
use Flash;

class AlumnoController extends AppBaseController
{
    /** @var AlumnoRepository $alumnoRepository*/
    private $alumnoRepository;

    public function __construct(AlumnoRepository $alumnoRepo)
    {
        $this->alumnoRepository = $alumnoRepo;
    }

    /**
     * Display a listing of the Alumno.
     */
    public function index(Request $request)
    {
        $alumnos = $this->alumnoRepository->paginate(10);

        return view('alumnos.index')
            ->with('alumnos', $alumnos);
    }

    /**
     * Show the form for creating a new Alumno.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created Alumno in storage.
     */
    public function store(CreateAlumnoRequest $request)
    {
        $input = $request->all();

        $alumno = $this->alumnoRepository->create($input);

        Flash::success('Alumno saved successfully.');

        return redirect(route('alumnos.index'));
    }

    /**
     * Display the specified Alumno.
     */
    public function show($id)
    {
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.show')->with('alumno', $alumno);
    }

    /**
     * Show the form for editing the specified Alumno.
     */
    public function edit($id)
    {
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.edit')->with('alumno', $alumno);
    }

    /**
     * Update the specified Alumno in storage.
     */
    public function update($id, UpdateAlumnoRequest $request)
    {
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        $alumno = $this->alumnoRepository->update($request->all(), $id);

        Flash::success('Alumno updated successfully.');

        return redirect(route('alumnos.index'));
    }

    /**
     * Remove the specified Alumno from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        $this->alumnoRepository->delete($id);

        Flash::success('Alumno deleted successfully.');

        return redirect(route('alumnos.index'));
    }
}

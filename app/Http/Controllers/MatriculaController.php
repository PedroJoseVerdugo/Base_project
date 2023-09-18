<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        // Obtener todas las matrículas y mostrarlas en una vista
        $matriculas = Matricula::all();
        return view('matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        // Mostrar un formulario para crear una nueva matrícula
        return view('matriculas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_matricula' => 'required|date',
            'alumno_id' => 'required|exists:alumnos,id',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'estado' => 'required|in:abierta,cerrada',
        ]);

        // Validar los datos del formulario y guardar una nueva matrícula en la base de datos
        // Puedes agregar la lógica de validación aquí
        $matricula = new Matricula;
        $matricula->fecha_matricula = $request->fecha_matricula;
        $matricula->alumno_id = $request->alumno_id;
        $matricula->asignatura_id = $request->asignatura_id;
        $matricula->estado = $request->estado;
        $matricula->save();

        return redirect()->route('matriculas.index')->with('success', 'Matrícula creada correctamente');
    }

    public function edit($id)
    {
        // Mostrar un formulario para editar una matrícula existente
        $matricula = Matricula::findOrFail($id);
        return view('matriculas.edit', compact('matricula'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario y actualizar una matrícula existente en la base de datos
        // Puedes agregar la lógica de validación aquí
        $matricula = Matricula::findOrFail($id);
        $matricula->fecha_matricula = $request->fecha_matricula;
        $matricula->alumno_id = $request->alumno_id;
        $matricula->asignatura_id = $request->asignatura_id;
        $matricula->estado = $request->estado;
        $matricula->save();

        return redirect()->route('matriculas.index')->with('success', 'Matrícula actualizada correctamente');
    }

    public function destroy($id)
    {
        // Eliminar una matrícula de la base de datos
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return redirect()->route('matriculas.index')->with('success', 'Matrícula eliminada correctamente');
    }
}

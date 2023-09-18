<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::all();
        return view('asignaturas.index', compact('asignaturas'));
    }

    public function create()
    {
        return view('asignaturas.create');
    }

    public function store(Request $request)
    {
       
        // Valida y almacena los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'creditos' => 'required|integer',
            'criterios_evaluacion' => 'required|string',
        ]);
    
        // Crear una nueva asignatura
        $asignatura = new Asignatura();
        $asignatura->nombre = $request->nombre;
        $asignatura->creditos = $request->creditos;
        $asignatura->criterios_evaluacion = $request->criterios_evaluacion;
        $asignatura->save();
        

        return redirect()->route('asignaturas.index')->with('success', 'Asignatura creada correctamente.');
        return redirect()->route('asignaturas.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'creditos' => 'required|integer',
            'criterios_evaluacion' => 'required|string', // Añade esta línea
        ]);
    }
}

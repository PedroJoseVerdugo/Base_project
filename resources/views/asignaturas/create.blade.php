@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Asignatura</h1>
        <form action="{{ route('asignaturas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la Asignatura:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="creditos">Créditos:</label>
                <input type="number" name="creditos" id="creditos" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="criterios_evaluacion">Criterios de Evaluación (textarea):</label>
                <textarea name="criterios_evaluacion" id="criterios_evaluacion" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="criterios_evaluacion_text">Criterios de Evaluación (input):</label>
                <input type="text" name="criterios_evaluacion_text" id="criterios_evaluacion_text" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Asignatura</button>
        </form>
    </div>
@endsection



{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Asignatura</h1>
        <form method="POST" action="{{ route('asignaturas.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="creditos">Créditos:</label>
                <input type="number" class="form-control" id="creditos" name="creditos" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Asignatura</button>
        </form>
    </div>
@endsection --}}
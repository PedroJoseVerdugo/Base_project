@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Matrícula</h1>
        <form action="{{ route('matriculas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="fecha_matricula">Fecha de Matrícula:</label>
                <input type="date" name="fecha_matricula" id="fecha_matricula" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alumno_id">Alumno:</label>
                <select name="alumno_id" id="alumno_id" class="form-control" required>
                    @foreach ($alumnos as $alumno)
                        <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="asignatura_id">Asignatura:</label>
                <select name="asignatura_id" id="asignatura_id" class="form-control" required>
                    @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="abierta">Abierta</option>
                    <option value="cerrada">Cerrada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Matrícula</button>
        </form>
    </div>
@endsection

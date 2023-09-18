{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Asignaturas</h1>

        <!-- Formulario para crear asignaturas -->
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

        <!-- Tabla de asignaturas existentes -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Créditos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaturas as $asignatura)
                    <tr>
                        <td>{{ $asignatura->nombre }}</td>
                        <td>{{ $asignatura->creditos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
 --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Asignaturas</h1>

        <!-- Botón para crear una nueva asignatura -->
        <a href="{{ route('asignaturas.create') }}" class="btn btn-primary mb-3">Crear Nueva Asignatura</a>

        <!-- Tabla de asignaturas existentes -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Créditos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaturas as $asignatura)
                    <tr>
                        <td>{{ $asignatura->nombre }}</td>
                        <td>{{ $asignatura->creditos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


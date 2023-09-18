@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Matrículas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha de Matrícula</th>
                    <th>Alumno</th>
                    <th>Asignatura</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matriculas as $matricula)
                    <tr>
                        <td>{{ $matricula->fecha_matricula }}</td>
                        <td>{{ $matricula->alumno->nombre }}</td>
                        <td>{{ $matricula->asignatura->nombre }}</td>
                        <td>{{ $matricula->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

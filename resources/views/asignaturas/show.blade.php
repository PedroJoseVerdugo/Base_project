@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Asignatura</h1>
        <p><strong>Nombre:</strong> {{ $asignatura->nombre }}</p>
        <p><strong>Créditos:</strong> {{ $asignatura->creditos }}</p>
        <p><strong>Criterios de Evaluación:</strong></p>
        <p>{{ $asignatura->criterios_evaluacion }}</p>

        <a href="{{ route('asignaturas.index') }}" class="btn btn-primary">Volver a la lista de asignaturas</a>
    </div>
@endsection

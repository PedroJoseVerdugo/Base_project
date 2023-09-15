<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $alumno->nombre }}</p>
</div>

<!-- Fecha Field -->
<div class="col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{{ $alumno->fecha }}</p>
</div>

<!-- Activo Field -->
<div class="col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}
    <p>{{ $alumno->activo }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $alumno->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $alumno->updated_at }}</p>
</div>


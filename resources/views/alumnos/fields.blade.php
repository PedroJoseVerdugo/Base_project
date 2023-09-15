<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha').datepicker()
    </script>
@endpush

<!-- Activo Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('activo', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('activo', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('activo', 'Activo', ['class' => 'form-check-label']) !!}
    </div>
</div>
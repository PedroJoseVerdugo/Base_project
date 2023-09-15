<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="alumnos-table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Activo</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->fecha }}</td>
                    <td>{{ $alumno->activo }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['alumnos.destroy', $alumno->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('alumnos.show', [$alumno->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('alumnos.edit', [$alumno->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $alumnos])
        </div>
    </div>
</div>

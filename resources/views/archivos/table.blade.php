<table class="table table-responsive" id="archivos-table">
    <thead>
        <tr>
            <th>Path</th>
        <th>Nombre</th>
        <th>Tamanio</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($archivos as $archivo)
        <tr>
            <td>{!! $archivo->path !!}</td>
            <td>{!! $archivo->nombre !!}</td>
            <td>{!! $archivo->tamanio !!}</td>
            <td>{!! $archivo->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['archivos.destroy', $archivo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('archivos.show', [$archivo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('archivos.edit', [$archivo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
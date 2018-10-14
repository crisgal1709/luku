<table class="table table-responsive" id="pagos-table">
    <thead>
        <tr>
        <th>Fecha</th>
        <th>Monto</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pagos as $pago)
        <tr>
            <td>{!! $pago->fecha !!}</td>
            <td>{!! number_format($pago->monto, 0, '.', ',') !!}</td>
            <td>
                {!! Form::open(['route' => ['pagos.destroy', $pago->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pagos.show', [$pago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pagos.edit', [$pago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-condensed">
            <tr>
                <td>ID</td>
                <td>
                    {{ Form::text('', $pago->id, ['class' => 'form-control']) }}
                </td>
            </tr>

            <tr>
                <td>Fecha</td>
                <td>
                    {{ Form::text('', $pago->fecha, ['class' => 'form-control']) }}
                </td>
            </tr>

            <tr>
                <td>Monto</td>
                <td>
                    {{ Form::text('', number_format($pago->monto, 0, '.', ','), ['class' => 'form-control']) }}
                </td>
            </tr>

            <tr>
                <td>Observaciones</td>
                <td>
                    {{ Form::textarea('', trim($pago->observaciones), ['class' => 'form-control']) }}
                </td>
            </tr>

            <tr>
                <td>Creado por</td>
                <td>
                    {{ Form::text('', trim($pago->usuario->name), ['class' => 'form-control']) }}
                </td>
            </tr>
        </table>
    </div>
</div>


<div class="container-fluid">
    <h3 class="text-center"><b>Archivos adjuntos</b></h3>

    @if ($pago->archivos->count() == 0)
        <p>Sin archivos</p>

        @else

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Archivo</th>
                    <th>Fecha Subida</th>
                    <th>Fecha Subida</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pago->archivos as $archivo)
                    <tr>
                        <td>{{ $archivo->nombre }}</td>
                        <td>{{ $archivo->created_at->format('d/m/Y h:i a') }}</td>
                        <td>
                            <a title="Descargar" target="_blank" href="{{ route('archivos.show', $archivo->id) }}" class="btn btn-success btn-xs">
                                <i class="fa fa-download"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
</div>

@include('layouts.present-show')

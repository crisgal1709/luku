<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-condensed">

            <tr>
                <td>Monto</td>
                <td>
                    {!! Form::number('monto', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                </td>
            </tr>

            <tr>
                <td>Fecha</td>
                <td>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text('fecha', NULL, ['class' => 'form-control fecha', 'required' => true, 'autocomplete' => 'off']) !!}
                    </div>
                </td>
            </tr>

            <tr>
                <td>Observaciones</td>
                <td>
                    {{ Form::textarea('observaciones', NULL, ['class' => 'form-control', 'size' => '30x4']) }}
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="container-fluid">
    <h4 class="text-center"><b>Archivos</b></h4>
    <div class="form-group col-sm-12 text-center">
        <label>selecciona...</label>
        <div class="box">
            <input style="display: none" type="file" name="archivos[]" id="file-6" class="inputfile inputfile-5 display-none" multiple="" data-multiple-caption="{count} archivos seleccionados"/>
            <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pagos.index') !!}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
<script src="/assets/CustomFileInputs/js/custom-file-input.js"></script>
    <script>
        $('.fecha').datepicker({
            autoclose: true,
            language: 'es',
            format: 'yyyy-mm-dd',
            orientation: 'bottom'
        });


    </script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="/assets/CustomFileInputs/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/assets/CustomFileInputs/css/component.css" />
@endpush

<!-- Modal -->
<div class="modal fade" id="devolver" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="{{ route('devoluciones.store') }}">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Devolver orden</h4>
                </div>
                <div class="modal-body">
                    <div class="text-left">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('recibido_por') ? ' has-error' : '' }}">
                            <label for="recibido_por" class="col-md-2 control-label">Recibido por</label>

                            <div class="col-md-8">
                                <input id="recibido_por" type="text" class="form-control" name="recibido_por"
                                       value="{{ old('recibido_por') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">
                            <label for="motivo" class="col-md-2 control-label">Motivo</label>

                            <div class="col-md-8">
                                <input id="motivo" type="text" class="form-control" name="motivo"
                                       value="{{ old('motivo') }}" required autofocus>
                            </div>
                        </div>

                        <input type="hidden" name="id_orden" value="{{$orden->id}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>

    </div>
</div>

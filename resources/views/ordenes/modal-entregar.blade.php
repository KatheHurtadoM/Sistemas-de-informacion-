<!-- Modal -->
<div class="modal fade" id="entregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="{{ route('entregas.store') }}">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Entregar orden</h4>
                </div>
                <div class="modal-body">
                    <div class="text-left">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('recibido_por') ? ' has-error' : '' }}">
                            <label for="recibido_por" class="col-md-2 control-label">Recibido por</label>

                            <div class="col-md-10">
                                <input id="recibido_por" type="text" class="form-control" name="recibido_por"
                                       value="{{ old('recibido_por') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nombre_factura') ? ' has-error' : '' }}">
                            <label for="nombre_factura" class="col-md-2 control-label">Nombre de la factura</label>

                            <div class="col-md-10">
                                <input id="nombre_factura" type="text" class="form-control" name="nombre_factura"
                                       value="{{ old('nombre_factura') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descuento') ? ' has-error' : '' }}">
                            <label for="descuento" class="col-md-2 control-label">Descuento</label>

                            <div class="col-md-10">
                                <input id="descuento" type="number" class="form-control" name="descuento"
                                       value="{{ old('descuento') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
                            <label for="nit" class="col-md-2 control-label">Nit</label>

                            <div class="col-md-10">
                                <input id="nit" type="text" class="form-control" name="nit"
                                       value="{{ old('nit') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('forma_pago') ? ' has-error' : '' }}">
                            <label for="forma_pago" class="col-md-2 control-label">Forma de pago</label>

                            <div class="col-md-10">
                                <select name="forma_pago" id="forma_pago" class="form-control">
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Tarjeta">Tarjeta</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('moneda') ? ' has-error' : '' }}">
                            <label for="moneda" class="col-md-2 control-label">Moneda</label>

                            <div class="col-md-10">
                                <select name="moneda" id="moneda" class="form-control">
                                    <option value="Bolivianos">Bolivianos</option>
                                    <option value="Dolares">Dolares</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cantidad_confirmada') ? ' has-error' : '' }}">
                            <label for="cantidad_confirmada" class="col-md-2 control-label">Cantidad requerida</label>

                            <div class="col-md-10">
                                <input id="cantidad_confirmada" type="checkbox" class="form-control"
                                       name="cantidad_confirmada"
                                       autofocus>
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


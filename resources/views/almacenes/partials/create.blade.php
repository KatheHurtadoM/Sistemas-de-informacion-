<!-- Modal -->
<div class="modal fade" id="crear-almacen" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->

        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="{{ route('almacenes.store') }}">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar almacen</h4>
                </div>
                <div class="modal-body">
                    <div class="text-left">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-2 control-label">Nombre</label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control" name="nombre"
                                       value="{{ old('nombre') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_zona') ? ' has-error' : '' }}">
                            <label for="id_zona" class="col-md-2 control-label">Almacen</label>
                            <div class="col-md-8">
                                <select id="id_zona" class="form-control" name="id_zona">
                                    @foreach($zonas as $zona)
                                        <option value="{{$zona->id}}">{{$zona->nombre}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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


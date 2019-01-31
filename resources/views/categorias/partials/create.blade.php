<!-- Modal -->
<div class="modal fade" id="crear-categoria" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->

        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="{{ route('categorias.store') }}">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar Categoria</h4>
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


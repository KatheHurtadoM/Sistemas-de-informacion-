<!-- Modal -->
<div class="modal fade" id="crear-producto" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="{{ route('productos.store') }}"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar Producto</h4>
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
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-2 control-label">Descripcion</label>

                            <div class="col-md-8">
                                <input id="descripcion" type="text" class="form-control" name="descripcion"
                                       value="{{ old('descripcion') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                            <label for="precio" class="col-md-2 control-label">Precio Bs.</label>

                            <div class="col-md-8">
                                <input id="precio" type="number" class="form-control" name="precio"
                                       value="{{ old('precio') }}" required autofocus>
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('id_categoria') ? ' has-error' : '' }}">
                            <label for="id_categoria" class="col-md-2 control-label">Categoria</label>
                            <div class="col-md-8">
                                <select id="id_categoria" class="form-control" name="id_categoria">
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('id_almacen') ? ' has-error' : '' }}">
                            <label for="id_almacen" class="col-md-2 control-label">Almacen</label>
                            <div class="col-md-8">
                                <select id="id_almacen" class="form-control" name="id_almacen">
                                    @foreach($almacenes as $almacen)
                                        <option value="{{$almacen->id}}">{{$almacen->nombre.' <--> '.$almacen->zona->nombre}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">
                            <label for="imagen" class="col-md-2 control-label">Imagen</label>
                            <div class="col-md-8">
                                <input type="file" accept="image/*" class="form-control" name="imagen">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label for="stock" class="col-md-2 control-label">Stock</label>

                            <div class="col-md-8">
                                <input id="stock" type="number" class="form-control" name="stock"
                                       value="{{ old('stock') }}" required autofocus>
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


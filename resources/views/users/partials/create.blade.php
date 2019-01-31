<!-- Modal -->
<div class="modal fade" id="crear-user" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->

        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar encargado</h4>
                </div>
                <div class="modal-body">
                    <div class="text-left">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Nombre</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">Email</label>

                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control" name="email"
                                       value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-2 control-label">Telefono</label>

                            <div class="col-md-8">
                                <input id="telefono" type="text" class="form-control" name="telefono"
                                       value="{{ old('telefono') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-2 control-label">Direccion</label>

                            <div class="col-md-8">
                                <input id="direccion" type="text" class="form-control" name="direccion"
                                       value="{{ old('direccion') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('id_rol') ? ' has-error' : '' }}">
                            <label for="id_rol" class="col-md-2 control-label">Rol</label>
                            <div class="col-md-8">
                                <select id="id_rol" class="form-control" name="id_rol">
                                    @foreach($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->nombre}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_zona') ? ' has-error' : '' }}">
                            <label for="id_zona" class="col-md-2 control-label">Zona</label>
                            <div class="col-md-8">
                                <select id="id_zona" class="form-control" name="id_zona">
                                    @foreach($zonas as $zona)
                                        <option value="{{$zona->id}}">{{$zona->nombre}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
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


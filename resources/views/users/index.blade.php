@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <strong>
                                Usuarios - Encargados
                            </strong>
                        </h4>
                        <button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal"
                                data-target="#crear-user">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </div>


                    <div class="panel-body">
                        <div class="col">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        @if(count($users)>0)
                            <div class="table-responsive">
                                <table class="table  table-bordered table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>E-mail</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Zona</th>
                                        <th>Opciones</th>
                                    </tr>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->telefono}}</td>
                                            <td>{{$user->direccion}}</td>
                                            <td>{{$user->zona->nombre}}</td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="{{route('users.edit',$user->id)}}"
                                                       style="color: #245269">
                                                        <span class="glyphicon glyphicon-edit"
                                                              aria-hidden="true"></span>
                                                    </a>

                                                    <a href="{{route('users.destroy',$user->id)}}"
                                                       style="color: red"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$user->id}}').submit();">
                                                        <span class="glyphicon glyphicon-trash"
                                                              aria-hidden="true"></span>
                                                    </a>

                                                    <form id="delete-form-{{$user->id}}"
                                                          action="{{route('users.destroy',$user->id)}}"
                                                          method="POST"
                                                          style="display: none;">
                                                        {{method_field('DELETE')}}
                                                        {{ csrf_field() }}
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {!! $users->links() !!}
                        @else
                            <div class="text-center">
                                <h4>
                                    No hay registros
                                </h4>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('users.partials.create')
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <strong>
                                Roles del sistema
                            </strong>
                        </h4>
                        <button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal"
                                data-target="#crear-rol">
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

                        @if(count($roles)>0)
                            <div class="table-responsive">
                                <table class="table  table-bordered table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Opciones</th>
                                    </tr>
                                    <tbody>
                                    @foreach($roles as $rol)
                                        <tr>
                                            <td>{{$rol->id}}</td>
                                            <td>{{$rol->nombre}}</td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="{{route('roles.edit',$rol->id)}}"
                                                       style="color: #245269">
                                                        <span class="glyphicon glyphicon-edit"
                                                              aria-hidden="true"></span>
                                                    </a>

                                                    <a href="{{route('roles.destroy',$rol->id)}}"
                                                       style="color: red"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$rol->id}}').submit();">
                                                        <span class="glyphicon glyphicon-trash"
                                                              aria-hidden="true"></span>
                                                    </a>

                                                    <form id="delete-form-{{$rol->id}}"
                                                          action="{{route('roles.destroy',$rol->id)}}"
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
                            {!! $roles->links() !!}
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
    @include('roles.partials.create')
@endsection

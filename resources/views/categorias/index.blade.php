@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <strong>
                                Categorias
                            </strong>
                        </h4>
                        <button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal"
                                data-target="#crear-categoria">
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

                        @if(count($categorias)>0)
                            <div class="table-responsive">
                                <table class="table  table-bordered table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Opciones</th>
                                    </tr>
                                    <tbody>
                                    @foreach($categorias as $categoria)
                                        <tr>
                                            <td>{{$categoria->id}}</td>
                                            <td>{{$categoria->nombre}}</td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="{{route('categorias.edit',$categoria->id)}}"
                                                       style="color: #245269">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </a>

                                                    <a href="{{route('categorias.destroy',$categoria->id)}}"
                                                       style="color: red"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$categoria->id}}').submit();">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </a>

                                                    <form id="delete-form-{{$categoria->id}}"
                                                          action="{{route('categorias.destroy',$categoria->id)}}"
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
                            {!! $categorias->links() !!}
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
    @include('categorias.partials.create')
@endsection

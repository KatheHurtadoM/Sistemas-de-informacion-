@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <strong>
                                Productos
                            </strong>
                        </h4>
                        <button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal"
                                data-target="#crear-producto">
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

                        @if(count($productos)>0)
                            <div class="table-responsive">
                                <table class="table  table-bordered table-hover ">
                                    <tr>
                                        <th>ID</th>
                                        <th>Avatar</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Categoria</th>
                                        <th>Almacen</th>
                                        <th>Stock</th>
                                        <th>Opciones</th>
                                    </tr>
                                    <tbody>
                                    @foreach($productos as $producto)
                                        <tr>
                                            <td>{{$producto->id}}</td>
                                            <td>
                                                <img width="128" height="128"
                                                     src="{{url('storage/'.$producto->imagen)}}"
                                                     alt="producto">
                                            </td>
                                            <td>{{$producto->nombre}}</td>
                                            <td>{{$producto->descripcion}}</td>
                                            <td>{{$producto->precio.' Bs'}}</td>
                                            <td>{{$producto->categoria->nombre}}</td>
                                            <td>{{$producto->almacen->nombre}}</td>
                                            <td>{{$producto->almacenStock->stock}}</td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="{{route('productos.edit',$producto->id)}}"
                                                       style="color: #245269">
                                                        <span class="glyphicon glyphicon-edit"
                                                              aria-hidden="true"></span>
                                                    </a>

                                                    <a href="{{route('productos.destroy',$producto->id)}}"
                                                       style="color: red"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$producto->id}}').submit();">
                                                        <span class="glyphicon glyphicon-trash"
                                                              aria-hidden="true"></span>
                                                    </a>

                                                    <form id="delete-form-{{$producto->id}}"
                                                          action="{{route('productos.destroy',$producto->id)}}"
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
                                {!! $productos->links() !!}
                            </div>

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
    @include('productos.partials.create')
@endsection

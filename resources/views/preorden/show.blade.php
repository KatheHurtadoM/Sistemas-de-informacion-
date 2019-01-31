@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <strong>
                                Pre - Orden de items
                            </strong>
                        </h4>
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

                        @if(count($preorden)>0)
                            <div class="table-responsive">
                                <table class="table  table-bordered table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Importe</th>
                                        <th>Opciones</th>
                                    </tr>
                                    <tbody>
                                    @foreach($preorden as $orden)
                                        <tr>
                                            <td>{{$orden->id}}</td>
                                            <td>
                                                <div class="text-center">
                                                    <img width="128" height="128"
                                                         src="{{url('storage/'.$orden->producto->imagen)}}"
                                                         alt="producto">
                                                    <br>
                                                    {{$orden->producto->nombre}}
                                                </div>
                                            </td>
                                            <td>{{$orden->producto->precio}}</td>
                                            <td>{{$orden->cantidad}}</td>
                                            <td>{{$orden->cantidad *$orden->producto->precio }}</td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="{{route('categorias.edit',$orden->id)}}"
                                                       style="color: #245269">
                                                        <span class="glyphicon glyphicon-trash"
                                                              aria-hidden="true"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col text-right">
                                    <a role="button" class="btn btn-primary" href="{{route('cart.confirmar')}}">
                                        Solicitar
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="text-center">
                                <h4>
                                    Vacio
                                </h4>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

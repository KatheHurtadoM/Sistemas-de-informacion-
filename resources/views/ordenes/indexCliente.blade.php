@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <strong>
                                Ordenes
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

                        @if(count($ordenes)>0)
                            <div class="table-responsive">
                                <table class="table  table-bordered table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Encargado</th>
                                        <th>Nombre en factura</th>
                                        <th>Nit</th>
                                        <th>Fecha de pedido</th>
                                        <th>Fecha de entrega</th>
                                        <th>Monto total</th>
                                        <th>Descuento</th>
                                        <th>Neto</th>
                                        <th>Opciones</th>
                                    </tr>
                                    <tbody>
                                    @foreach($ordenes as $orden)
                                        <tr>
                                            <td>{{$orden->id}}</td>
                                            <td>{{$orden->cliente->name}}</td>
                                            <td>
                                                @if($orden->encargado!=null)
                                                    {{$orden->encargado->name}}
                                                @else
                                                    Sin asignar
                                                @endif
                                            </td>
                                            <td>{{$orden->nombre_factura}}</td>
                                            <td>
                                                @if($orden->nit)
                                                    {{$orden->nit}}
                                                @else
                                                    Sin nit
                                                @endif
                                            </td>
                                            <td>{{$orden->created_at}}</td>
                                            <td>{{$orden->fecha_entrega}}</td>
                                            <td>{{$orden->total}}</td>
                                            <td>{{$orden->descuento}}</td>
                                            <td>{{$orden->total-$orden->descuento}}</td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="{{route('ordenes.show',$orden->id)}}"
                                                       style="color: #245269">
                                                        <span class="glyphicon glyphicon-eye-open"
                                                              aria-hidden="true"></span>
                                                    </a>
                                                    @if(auth()->user()->isEncargado() && $orden->encargado==null)
                                                        <a href="{{route('ordenes.asignarme',$orden->id)}}"
                                                           onclick="event.preventDefault();
                                                                   document.getElementById('asignarme-form-{{$orden->id}}').submit();"
                                                           style="color: #245269">
                                                        <span class="glyphicon glyphicon-user"
                                                              aria-hidden="true"></span>
                                                        </a>

                                                        <form id="asignarme-form-{{$orden->id}}"
                                                              action="{{route('ordenes.asignarme',$orden->id)}}"
                                                              method="POST"
                                                              style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {!! $ordenes->links() !!}
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
@endsection

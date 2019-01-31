@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <strong>
                                Ordenes - Orden #{{$orden->id}}
                            </strong>
                        </h4>
                        <h6>
                            Detalles de la orden
                        </h6>
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

                        <div class="text-left">
                            <p>
                                Fecha de pedido: {{$orden->created_at}}
                            </p>
                            <p>
                                Fecha de entrega solictada: {{$orden->fecha_entrega}}
                            </p>
                            <p>
                                Cliente:{{$orden->cliente->name}}
                            </p>
                            <p>
                                Encargado: @if($orden->encargado!=null)
                                    {{$orden->encargado->name}}
                                @else
                                    Sin asignar
                                @endif
                            </p>
                        </div>

                        @if(count($detalles)>0)
                            <div class="table-responsive">
                                <table class="table  table-bordered table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Importe</th>
                                    </tr>
                                    <tbody>
                                    @foreach($detalles as $detalle)
                                        <tr>
                                            <td>{{$detalle->id}}</td>
                                            <td>{{$detalle->producto->nombre}}</td>
                                            <td>{{$detalle->cantidad}}</td>
                                            <td>{{$detalle->importe.' Bs'}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right">
                                Total: {{$orden->total.' Bs'}}
                            </div>

                            {{--AQUI MANTENER LA INFORMACION SOBRE ESTADOS--}}
                            @if($orden->isRecibido() && $orden->id_user_encargado==auth()->id())
                                <div class="text-left">
                                    <button type="button" class="btn btn-default" aria-label="Left Align"
                                            data-toggle="modal"
                                            data-target="#devolver">
                                        Devolver
                                    </button>
                                    <button type="button" class="btn btn-primary" aria-label="Left Align"
                                            data-toggle="modal"
                                            data-target="#entregar">
                                        Entregar
                                    </button>
                                </div>
                            @elseif($orden->isEntregado())
                                <div class="col">
                                    <div class="alert alert-success">
                                        <strong>
                                            Orden entregada
                                        </strong>
                                        <p>Recibido por: {{$orden->entrega->recibido_por}}</p>
                                        <p>Cantidad requerida: {{$orden->entrega->cantidad_confirmada==1?'Si':'No'}}</p>
                                    </div>
                                </div>
                            @elseif($orden->isDevuelto())
                                <div class="col">
                                    <div class="alert alert-danger">
                                        <strong>
                                            Orden devuelta
                                        </strong>
                                        <p>
                                            Motivo: {{$orden->devolucion->motivo}}
                                        </p>
                                        <p>
                                            Recibido por: {{$orden->devolucion->recibido_por}}
                                        </p>
                                    </div>

                                </div>
                            @endif
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
    @include('ordenes.modal-entregar')
    @include('ordenes.modal-devolver')
@endsection

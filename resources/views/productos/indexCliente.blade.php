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
                            <div class="row">
                                @foreach($productos as $producto)
                                    <div class="col-lg-3 col-md-4 col-sm-12 text-center">
                                        <img width="128" height="128" src="{{url('storage/'.$producto->imagen)}}"
                                             alt="producto">
                                        <br>
                                        <p>
                                            {{$producto->nombre.'  '.$producto->precio.' Bs'}}
                                        </p>
                                        <p>
                                            <a href="{{route('cart.store')}}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('add-form-{{$producto->id}}').submit();">
                                                <span class="glyphicon glyphicon-shopping-cart"
                                                      aria-hidden="true"></span>
                                            </a>
                                        </p>
                                        <form id="add-form-{{$producto->id}}"
                                              action="{{route('cart.store')}}"
                                              method="POST"
                                              style="display: none;">
                                            <input type="hidden" name="id_producto" value="{{$producto->id}}">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            {!!$productos->links()!!}
                            <div class="col text-right">
                                <a role="button" class="btn btn-primary" href="{{route('cart.ver')}}">
                                    Confirmar
                                </a>
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
@endsection

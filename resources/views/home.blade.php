@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Panel de inicio</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>
                            Bienvenido a <strong>CRUZIMEX</strong>
                        </p>

                        <br>
                        <div class="text-center">
                            <u>
                                <a href="{{ route('productos.ver') }}">Ver productos</a>
                            </u>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

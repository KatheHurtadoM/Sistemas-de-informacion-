<?php

namespace App\Http\Controllers;

use App\Entregas;
use App\Orden;
use Illuminate\Http\Request;

class EntregaController extends Controller
{
    public function index()
    {
        $ordenes = Orden::where('id_estado', 2)->paginate(10);
        return view('ordenes.entregados.index', compact('ordenes'));
    }

    public function store(Request $request)
    {

        if ($request->has('cantidad_confirmada')) {
            $request->merge(['cantidad_confirmada' => 1]);
        }


        $orden = Orden::find($request->get('id_orden'));

        
        $orden->update(
            [
                'id_estado' => 2,
                'nombre_factura'=>$request->get('nombre_factura'),
                'nit'=>$request->get('nit'),
                'descuento'=>$request->get('descuento'),
                'forma_pago'=>$request->get('forma_pago')
            ]);

        Entregas::create($request->all());

        return back()->with(['status' => 'Orden entregada']);

    }
}

<?php

namespace App\Http\Controllers;

use App\CartOrden;
use App\DetalleOrden;
use App\Orden;
use App\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function store(Request $request)
    {

        $cartOrden = CartOrden::where('id_producto', $request->get('id_producto'))->first();
        $producto = Producto::find($request->get('id_producto'));
        if ($cartOrden != null) {
            $cartOrden->cantidad += 1;
            $cartOrden->save();
        } else {
            $request->merge(['cantidad' => 1]);
            CartOrden::create($request->all());
        }
        return back()->with(['status' => 'Cambios guardados,' . $producto->nombre . ' agregado a su orden']);
    }


    public function show()
    {
        $preorden = CartOrden::all();
        return view('preorden.show', compact('preorden'));
    }

    public function confirmar()
    {
        $preOrdens = CartOrden::all();

        if ($preOrdens->isNotEmpty()) {
            $total = null;

            $orden = Orden::create(
                [
                    'id_user_cliente' => auth()->id(),
                    'total' => 0,
                    'descuento' => 0,
                    'nombre_factura' => auth()->user()->name,
                    'fecha_entrega' => Carbon::now()->toDateString(), 'id_estado' => 1
                ]);
            foreach ($preOrdens as $preOrden) {
                $total += $preOrden->cantidad * Producto::find($preOrden->id_producto)->precio;
                DetalleOrden::create(
                    [
                        'id_producto' => $preOrden->id_producto,
                        'id_orden' => $orden->id,
                        'cantidad' => $preOrden->cantidad,
                        'importe' => $preOrden->cantidad * Producto::find($preOrden->id_producto)->precio,
                        'precio_venta' => Producto::find($preOrden->id_producto)->precio
                    ]
                );
            }


            CartOrden::truncate();
            $orden->update(['total' => $total]);
        } else {
            return back()->with(['status' => 'No agrego items a su orden']);
        }
        return redirect()->to('ver/productos');
    }
}

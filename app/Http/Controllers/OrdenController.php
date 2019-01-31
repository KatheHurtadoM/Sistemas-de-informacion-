<?php

namespace App\Http\Controllers;

use App\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = Orden::paginate(10);
        return view('ordenes.index', compact('ordenes'));
    }

    public function indexCliente()
    {
        $ordenes = Orden::where('id_user_cliente', auth()->id())->paginate(10);
        return view('ordenes.indexCliente', compact('ordenes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orden = Orden::find($id);
        $detalles = $orden->detalles()->get();
        return view('ordenes.show', compact('detalles', 'orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function realizarAsignacion(Request $request, Orden $orden)
    {
        $orden->update(['id_user_encargado' => auth()->id()]);
        return back()->with(['status' => 'Cambios guardados']);

    }
}

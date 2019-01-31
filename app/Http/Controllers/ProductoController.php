<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\AlmacenProducto;
use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(10);
        $categorias = Categoria::all();
        $almacenes = Almacen::all();
        return view('productos.index', compact('productos', 'categorias', 'almacenes'));
    }


    public function indexCliente()
    {
        $productos = Producto::paginate(10);
        return view('productos.indexCliente', compact('productos'));
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
        $producto = Producto::create($request->except(['imagen']));
        $path = $request->file('imagen')->store('productos-imagenes');

        $producto->imagen = $path;
        $producto->save();


        $stockData = $request->only(['id_almacen', 'stock']);
        $stockData['id_producto'] = $producto->id;
        AlmacenProducto::create($stockData);
        return back()->with(['status' => 'Cambios guardados']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return back()->with(['status' => 'Cambios guardados']);
    }
}

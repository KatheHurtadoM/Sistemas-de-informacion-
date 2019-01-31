<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'precio', 'id_categoria', 'id_almacen'];

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'id_almacen');
    }


    public function almacenStock()
    {
        return $this->hasOne(AlmacenProducto::class, 'id_producto');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}

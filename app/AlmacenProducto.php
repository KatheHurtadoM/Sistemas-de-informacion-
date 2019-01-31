<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlmacenProducto extends Model
{
    protected $table = 'almacen_productos';
    protected $fillable = ['id_almacen', 'id_producto', 'stock'];
}

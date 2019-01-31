<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    protected $table = 'detalle_ordens';
    public $timestamps = false;
    protected $fillable = ['id_producto', 'id_orden', 'cantidad', 'importe', 'precio_venta'];


    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}

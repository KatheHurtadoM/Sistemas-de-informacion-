<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartOrden extends Model
{
    protected $table = 'cart_ordens';
    protected $fillable = ['id_producto', 'cantidad'];

    public function producto(){
        return $this->belongsTo(Producto::class,'id_producto');
    }
}

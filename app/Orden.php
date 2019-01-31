<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    protected $fillable =
        [
            'id_user_cliente',
            'nit',
            'id_user_encargado',
            'total',
            'descuento',
            'nombre_factura',
            'forma_pago',
            'moneda',
            'fecha_entrega',
            'id_estado'
        ];

    public function cliente()
    {

        return $this->belongsTo(User::class, 'id_user_cliente');
    }

    public function encargado()
    {

        return $this->belongsTo(User::class, 'id_user_encargado');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleOrden::class, 'id_orden');
    }

    public function isRecibido()
    {
        return $this->id_estado == 1;
    }

    public function isEntregado()
    {
        return $this->id_estado == 2;
    }

    public function isDevuelto()
    {
        return $this->id_estado == 3;
    }

    public function devolucion()
    {
        return $this->hasOne(Devolucion::class, 'id_orden');
    }

    public function entrega()
    {
        return $this->hasOne(Entregas::class, 'id_orden');

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = 'devoluciones';
    protected $fillable = ['id_orden', 'motivo', 'recibido_por'];
}

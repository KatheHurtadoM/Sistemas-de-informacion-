<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entregas extends Model
{
    protected $table = "entregas";
    protected $fillable = ['recibido_por', 'cantidad_confirmada', 'id_orden'];
}

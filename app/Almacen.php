<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacenes';
    protected $fillable = ['id_zona', 'nombre'];


    public function zona()
    {
        return $this->belongsTo(Zona::class, 'id_zona');
    }
}

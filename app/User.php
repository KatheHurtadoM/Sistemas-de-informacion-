<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id_zona', 'id_rol', 'telefono', 'direccion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        $rol = Rol::where('nombre', 'admin')->first();
        return ($this->id_rol == $rol->id);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function scopeByRole($query, $rol)
    {
        $rol = Rol::where('nombre', 'LIKE', '%' . $rol . '%')->first();
        $query->where('id_rol', $rol->id);
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'id_zona');
    }

    public function isEncargado()
    {
        $rol = Rol::where('nombre', 'encargado')->first();
        return ($this->id_rol == $rol->id);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable {
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = 'true';
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nombre_usuario',
        'correo',
        'password',
        'rol_id',
        'nombre',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rol(){
        return $this->belongsTo('App\Models\Rol', 'roles_id');
    }

    public function donativo(){
        return $this->hasMany('App\Models\Donativo', 'usuarios_id');
    }
}

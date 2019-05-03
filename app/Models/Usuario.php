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
    public $timestamps = true;

    protected $fillable = [
        'nombre_usuario',
        'correo',
        'password',
        'rol_id',
        'nombre',
        'surname',
        'phone_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

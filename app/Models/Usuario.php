<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
<<<<<<< HEAD
    protected $incrementing = 'true';
    protected $keyType = 'string';

    public $timestamps = false;

    public function rol(){
        return $this->belongsTo('App\Models\Rol', 'roles_id');
    }

    public function donativo(){
        return $this->hasMany('App\Models\Donativo', 'usuarios_id');
    }
=======
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
>>>>>>> 09ffd25e83f29e41cbd864e17b3b2d07e9f87a9e
}

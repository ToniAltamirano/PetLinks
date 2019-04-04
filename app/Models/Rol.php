<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function usuario(){
        return $this->hasMany('App\Models\Usuario', 'roles_id');
    }
}

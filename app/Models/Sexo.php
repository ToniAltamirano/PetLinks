<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = 'sexo';
    protected $primaryKey = 'id';
    protected $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    public function donante(){
        return $this->hasMany('App\Models\Donante', 'sexos_id');
    }
}

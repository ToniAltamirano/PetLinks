<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centros';
    protected $primaryKey = 'id';
    public $incrementing = 'true';
    protected $keyType = 'int';

    public $timestamps = false;

    public function donativoReceptor(){
        return $this->hasMany('App\Models\Donativo', 'centros_receptor_id');
    }

    public function donativoDesti(){
        return $this->hasMany('App\Models\Donativo', 'centros_desti_id');
    }

}

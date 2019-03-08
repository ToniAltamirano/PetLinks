<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id';
    protected $incrementing = 'true';
    protected $keyType = 'int';

    public $timestamps = false;

    public function subtipos(){
        return $this->hasMany('App\Models\Subtipos', 'tipos_id');
    }
}

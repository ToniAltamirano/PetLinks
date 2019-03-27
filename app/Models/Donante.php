<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $table = 'donantes';
    protected $primaryKey = 'id';
    public $incrementing = 'true';
    protected $keyType = 'int';

    public $timestamps = false;

    public function sexo(){
        return $this->belongsTo('App\Models\Sexo', 'sexos_id');
    }

    public function donativos(){
        return $this->hasMany('App\Models\Donativo', 'donantes_id');
    }

    public function tiposDonante(){
        return $this->belongsTo('App\Models\TiposDonantes', 'tipos_donante_id');
    }

    public function animal(){
        return $this->belongsToMany('App\Models\Animal', 'donantes_animales', 'donantes_id', 'animales_id');
    }
}

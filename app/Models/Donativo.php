<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donativo extends Model
{
    protected $table = 'donativos';
    protected $primaryKey = 'id';
    public $incrementing = 'true';
    protected $keyType = 'int';
    public $timestamps = false;

    public function animal(){
        return $this->belongsToMany('App\Models\Animal', 'animales_donativos', 'donativos_id', 'animales_id');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario', 'usuarios_id');
    }

    public function subtipos(){
        return $this->belongsTo('App\Models\Subtipo', 'subtipos_id');
    }

    // public function tipoDonante(){
    //     return $this->belongsTo('App\Models\TiposDonante', 'tipos_donante_id');
    // }

    public function donante(){
        return $this->belongsTo('App\Models\Donante', 'donantes_id');
    }

    public function centroReceptor(){
        return $this->belongsTo('App\Models\Centro', 'centros_receptor_id');
    }

    public function centroDestino(){
        return $this->belongsTo('App\Models\Centro', 'centros_desti_id');
    }
}

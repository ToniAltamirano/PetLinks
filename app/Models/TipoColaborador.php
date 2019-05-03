<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoColaborador extends Model
{
    protected $table = 'tipo_colaborador';
    protected $primaryKey = 'descripcion';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function donante(){
        return $this->hasMany('App\Models\Donante', 'tipo_colaboracion');
    }
}

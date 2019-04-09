<?php

namespace App\Http\Controllers\Api;

use App\Models\Centro;
use App\Models\Donativo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CentroResource;

class CentroController extends Controller
{
    public function centros_destino(){
        $donativos = Donativo::select('centros_desti_id')->get();
        $centros = Centro::all();

        $data['donativos'] = $donativos;
        $data['centros'] = $centros;
        return new CentroResource($data);
    }
}

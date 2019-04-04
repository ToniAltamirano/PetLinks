<?php

namespace App\Http\Controllers\Api;

use App\Models\Donante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DonativoResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class DonanteController extends Controller {
    public function animales(){
        // WIP
        // $subtipos = Donativo::select('subtipos_id')->with('subtipos')->get();
        // $tipos = Tipo::all();

        // $data['donaciones_subtipos'] = $subtipos;
        // $data['tipos'] = $tipos;
        // return new DonanteResource($data);
    }
}

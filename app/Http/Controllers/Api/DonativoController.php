<?php

namespace App\Http\Controllers\Api;

use App\Models\Donativo;
use App\Models\Tipo;
use App\Models\Subtipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DonativoResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class DonativoController extends Controller
{
    public function index(){
        // $donativos = Donativo::all();

        // return new DonativoResource($donativos);
    }

    public function store(Request $request){
        //
    }

    public function show(Donativo $donativo){
        //
    }

    public function update(Request $request, Donativo $donativo){
        //
    }

    public function destroy(Donativo $donativo){
        //
    }

    public function tipo_donacion(){
        $subtipos = Donativo::select('subtipos_id')->with('subtipos')->get();
        $tipos = Tipo::all();

        $data['donaciones_subtipos'] = $subtipos;
        $data['tipos'] = $tipos;
        return new DonativoResource($data);
    }

    public function subtipos_donacion(){
        $subtipos_donaciones = Donativo::select('subtipos_id')->get();
        $subtipos = Subtipo::all();

        $data['donaciones_subtipos'] = $subtipos_donaciones;
        $data['subtipos'] = $subtipos;

        return new DonativoResource($data);
    }
}

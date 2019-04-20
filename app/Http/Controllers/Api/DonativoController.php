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

use Illuminate\Support\Carbon;

class DonativoController extends Controller
{
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

    public function dinero_donaciones($fechaInicio, $fechaFinal){
        $fechaInicio = explode("-", $fechaInicio);
        $fechaFinal = explode("-", $fechaFinal);

        $to = Carbon::createFromDate($fechaInicio[0], $fechaInicio[1]);
        $from = Carbon::createFromDate($fechaFinal[0], $fechaFinal[1]);
        $fechas = $this->generateDateRange($to, $from);

        $donativos = Donativo::all();
        foreach ($donativos as $donativo) {
            $formatoFecha = explode(" ", $donativo->fecha_donativo);
            $donativo->fecha_donativo = $formatoFecha[0];
            $formatoMes = explode("-", $donativo->fecha_donativo);
            $donativo->fecha_donativo = $formatoMes[0] . "-" . $formatoMes[1];
        }

        $data['donativos'] = $donativos;
        $data['periodo'] = $fechas;

        return new DonativoResource($data);
    }

    //genera fechas por mes
    private function generateDateRange(Carbon $start_date, Carbon $end_date){
        $dates = [];
        for($date = $start_date; $date->lte($end_date); $date->addMonth()) {
            $dates[] = $date->format('Y-m');
        }
        return $dates;
    }

    public function tipos_fecha($fechaInicio, $fechaFinal){
        $fechaInicio = explode("-", $fechaInicio);
        $fechaFinal = explode("-", $fechaFinal);

        $to = Carbon::createFromDate($fechaInicio[0], $fechaInicio[1]);
        $from = Carbon::createFromDate($fechaFinal[0], $fechaFinal[1]);
        $fechas = $this->generateDateRange($to, $from);

        $donativos = Donativo::with('subtipos')->get();
        foreach ($donativos as $donativo) {
            $formatoFecha = explode(" ", $donativo->fecha_donativo);
            $donativo->fecha_donativo = $formatoFecha[0];
            $formatoMes = explode("-", $donativo->fecha_donativo);
            $donativo->fecha_donativo = $formatoMes[0] . "-" . $formatoMes[1];
        }

        $tipos = Tipo::all();

        $data['tipos'] = $tipos;
        $data['donativos'] = $donativos;
        $data['periodo'] = $fechas;

        return new DonativoResource($data);
    }

    public function countPinso(){
        $donaciones = Donativo::select('subtipos_id', 'peso')->with('subtipos')->get();

        $pinso = 0;
        foreach ($donaciones as $donacion) {
            $nombre = $donacion->subtipos->nombre;
            if(strpos($nombre, 'Alimento') !== false && strpos($nombre, 'seco') !== false){
                if($donacion->peso != null){
                    $pinso += $donacion->peso;
                }
            }
        }

        $total3 = 1000;
	    $cantidad3=$pinso;
        $porcentage=$cantidad3/$total3*100;

        $datos['cantidad'] = $pinso;
        $datos['porcentage'] = $porcentage;
        return $datos;
    }

    public function countDinero(){
        //para cojer un mes anterior de la fecha actual
        //Carbon::now()->subMonth()->toDateString()
        $donaciones = Donativo::where('fecha_donativo', '>', 2019-01-01)->sum('coste');

        $total3 = 10000;
	    $cantidad3=$donaciones;
        $porcentage=$cantidad3/$total3*100;
        $donaciones = round($donaciones, 2);
        $datos['cantidad'] = $donaciones;
        $datos['porcentage'] = $porcentage;
        return $datos;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Donativo;
use App\Models\Centro;
use App\Models\Tipo;
use App\Models\Subtipo;
use App\Models\Usuario;
use App\Models\TiposDonante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// para archivos
use Illuminate\Http\UploadFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

//para fecha
use Illuminate\Support\Carbon;

class DonativoController extends Controller {
    public function index() {
        $donativos = Donativo::all();

        $datos['donativos'] = $donativos;

        return view('auth.admin.donations.index', $datos);
    }

    public function create() {
        $centros = Centro::all();
        $tiposDonacion = Tipo::all();
        $subtiposDonacion = Subtipo::all();
        $usuarios = Usuario::all();
        $tiposDonante = TiposDonante::all();

        $datos['centros'] = $centros;
        $datos['tiposDonacion'] = $tiposDonacion;
        $datos['subtiposDonacion'] = $subtiposDonacion;
        $datos['usuarios'] = $usuarios;
        $datos['tiposDonante'] = $tiposDonante;

        return view('auth.admin.donations.new', $datos);
    }

    public function store(Request $request) {
        //insertar donacion y luego hacer el update con la ruta de la donacion si es que lleva. con el id de la donacion en el nombre
        $donativo = new Donativo();

        if($request->input('centroReceptor') === "otro"){
            $donativo->centro_receptor_altres = $request->input('otroCentroReceptor');
        }
        else{
            $donativo->centros_receptor_id = $request->input('centroReceptor');
        }

        $donativo->centros_desti_id = $request->input('centroDestino');

        $donativo->users_id = $request->input('idPersonaReceptora');

        $donativo->usuario_receptor = Usuario::where('id', $donativo->users_id)->first()->nombre_usuario;

        $donativo->desc_animal = $request->input('animal');

        $donativo->subtipos_id = $request->input('subtipo');

        $donativo->mas_detalles = $request->input('masDetalles');

        $donativo->coste = $request->input('coste');

        $donativo->unidades = $request->input('unidades');

        $donativo->peso = $request->input('peso');

        if($request->input('hayFactura')){
            $donativo->hay_factura = $request->input('hayFactura');
        }
        else{
            $donativo->hay_factura = "0";
        }

        if($request->input('coordinada')){
            $donativo->es_coordinada = $request->input('coordinada');
        }
        else{
            $donativo->es_coordinada = "0";
        }

        $donativo->fecha_donativo = Carbon::now();

        $archivo = $request->file('detallesFactura');

        $donativo->save();

        if($archivo){
            //$imagen_ruta = $archivo->getClientOriginalName();
            //cambio del nombre del archivo para guardarlo en el server ftp
            //cambio de la ruta para guadarla en la bd
            $factura_ruta = "Factura_" . $donativo->id . "." . $archivo->getClientOriginalExtension();
            $donativo->ruta_factura = $factura_ruta;
            $donativo->save();
            Storage::disk('ftp')->putFileAs('facturas/', $archivo, $factura_ruta);
        }
    }

    public function edit(Donativo $donativo) {
        //
    }

    public function update(Request $request, Donativo $donativo) {
        //
    }

    public function destroy(Donativo $donativo) {
        //
    }
}

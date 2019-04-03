<?php

namespace App\Http\Controllers;

use App\Models\Donativo;
use App\Models\Centro;
use App\Models\Tipo;
use App\Models\Subtipo;
use App\Models\Usuario;
use App\Models\TiposDonante;
use App\Models\Donante;
use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// para archivos
use Illuminate\Http\UploadFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

//para fecha
use Illuminate\Support\Carbon;

//Control de errores
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class DonativoController extends Controller {
    public function index() {
        $donativos = Donativo::all();
        $animales = Animal::all();

        $datos['animales'] = $animales;
        $datos['donativos'] = $donativos;

        return view('auth.admin.donations.index', $datos);
    }

    public function create() {
        $centros = Centro::all();
        $tiposDonacion = Tipo::all();
        $subtiposDonacion = Subtipo::all();
        $usuarios = Usuario::all();
        $tiposDonante = TiposDonante::all();
        $animales = Animal::all();

        $datos['centros'] = $centros;
        $datos['tiposDonacion'] = $tiposDonacion;
        $datos['subtiposDonacion'] = $subtiposDonacion;
        $datos['usuarios'] = $usuarios;
        $datos['tiposDonante'] = $tiposDonante;
        $datos['animales'] = $animales;

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

        $donante = $request->input('donante');

        if($donante == "anonimo"){
            $id_donante = 1;
        }
        else{
            $cif_dni = $request->input('dnicif');
            $id_donante = Donante::where('cif', $cif_dni)->first()->id;
        }

        $donativo->donantes_id = $id_donante;
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

        try{
            $donativo->save();

            if($archivo){
                $factura_ruta = "Factura_" . $donativo->id . "." . $archivo->getClientOriginalExtension();
                $donativo->ruta_factura = $factura_ruta;
                $donativo->save();
                Storage::disk('public')->putFileAs('imagenes/facturas/', $archivo, $factura_ruta);
            }
        }
        catch(QueryException $e){
            $error = Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect()->action('DonativoController@create')->withInput();
        }

        $animales = $request->input('tipoAnimal');
        $donativo->animal()->attach($animales);
        return redirect()->action('DonativoController@index');
    }

    public function edit(Donativo $donacione) {
        $datos['donativo'] = $donacione;

        $centros = Centro::all();
        $tiposDonacion = Tipo::all();
        $subtiposDonacion = Subtipo::all();
        $usuarios = Usuario::all();
        $tiposDonante = TiposDonante::all();
        $animales = Animal::all();

        $datos['centros'] = $centros;
        $datos['tiposDonacion'] = $tiposDonacion;
        $datos['subtiposDonacion'] = $subtiposDonacion;
        $datos['usuarios'] = $usuarios;
        $datos['tiposDonante'] = $tiposDonante;
        $datos['animales'] = $animales;
        $datos['donantivo_animales'] = array_pluck($donacione->animal, 'id');

        return view('auth.admin.donations.edit', $datos);
    }

    public function update(Request $request, Donativo $donacione) {
        if($request->input('centroReceptor') === "otro"){
            $donacione->centro_receptor_altres = $request->input('otroCentroReceptor');
        }
        else{
            $donacione->centros_receptor_id = $request->input('centroReceptor');
        }

        $donacione->centros_desti_id = $request->input('centroDestino');
        $donacione->users_id = $request->input('idPersonaReceptora');
        $donacione->usuario_receptor = Usuario::where('id', $donacione->users_id)->first()->nombre_usuario;
        $donacione->desc_animal = $request->input('animal');
        $donacione->subtipos_id = $request->input('subtipo');
        $donacione->mas_detalles = $request->input('masDetalles');
        $donacione->coste = $request->input('coste');
        $donacione->unidades = $request->input('unidades');
        $donacione->peso = $request->input('peso');

        $archivo = $request->file('detallesFactura');

        if($request->input('hayFactura')){
            if($archivo){
                if($donacione->ruta_factura){
                    if(Storage::disk('public')->exists('imagenes/facturas/' . $donacione->ruta_factura)){
                        Storage::disk('public')->delete('imagenes/facturas/' . $donacione->ruta_factura);
                    }
                }
                $factura_ruta = "Factura_" . $donacione->id . "." . $archivo->getClientOriginalExtension();
                $donacione->ruta_factura = $factura_ruta;
                $donacione->hay_factura = $request->input('hayFactura');
                Storage::disk('public')->putFileAs('imagenes/facturas/', $archivo, $factura_ruta);
            }
        }
        else{
            $donacione->hay_factura = "0";
            if($donacione->ruta_factura){
                if(Storage::disk('public')->exists('imagenes/facturas/' . $donacione->ruta_factura)){
                    Storage::disk('public')->delete('imagenes/facturas/' . $donacione->ruta_factura);
                    $donacione->ruta_factura = null;
                }
            }
        }

        if($request->input('coordinada')){
            $donacione->es_coordinada = $request->input('coordinada');
        }
        else{
            $donacione->es_coordinada = "0";
        }

        try{
            $donacione->save();
        }
        catch(QueryException $e){
            $error = Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect()->action('DonativoController@edit')->withInput();
        }
        $donacione->animal()->detach();
        $animales = $request->input('tipoAnimal');
        $donacione->animal()->attach($animales);
        return redirect()->action('DonativoController@index');
    }

    public function destroy(Donativo $donacione, Request $request) {
        if($donacione->ruta_factura != null){
            if(Storage::disk('public')->exists('imagenes/facturas/' . $donacione->ruta_factura)){
                Storage::disk('public')->delete('imagenes/facturas/' . $donacione->ruta_factura);
            }
        }

        try {
            $donacione->animal()->detach();
            $donacione->delete();
        } catch(QueryException $ex) {
            $error = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $error);
        }

        return redirect('/donaciones');
    }
}

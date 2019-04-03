<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Database\QueryException;
use App\Clases\Utilitat;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CentroController extends Controller {
    public function index() {
        $centros = Centro::All();
        $datos['centros'] = $centros;

        return view('auth.admin.centros.index', $datos);
    }

    public function indexPublico() {
        $centros = Centro::All();
        $datos['centros'] = $centros;

        return view('info.centres', $datos);
    }

    public function create() {
        $datos['provincias'] = [
            'Barcelona',
            'Girona',
            'Lleida',
            'Tarragona',
        ];

        return view('auth.admin.centros.create', $datos);
    }

    public function store(Request $request) {
        $fichero = $request->file('imagen');

        $centro = new Centro();
        $centro->nombre =  $request->input('nombre');
        $centro->descripcion =  $request->input('descripcion');
        $centro->telefono = $request->input('telefono');
        $centro->direccion =  $request->input('direccion');
        $centro->codigo_postal =  $request->input('codigo_postal');
        $centro->ciudad =  $request->input('ciudad');
        $centro->provincia =  $request->input('provincia');

        try {
            $centro->save();
            if($fichero) {
                $imagen_path = 'id_centro=' . $centro->id . '_' . $fichero->getClientOriginalName();
                Storage::disk('public')->putFileAs('imagenes/centers/', $fichero, $imagen_path);
                $centro->imagen =  'imagenes/centers/' . $imagen_path;
            }

            $centro->save();
            $success = __('admin/centros.success_store');
            $request->session()->flash('success', $success);
            return redirect('/centros')->withInput();
        } catch(QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect('/centros/create')->withInput();
        }
    }
    public function edit(Centro $centro) {
        $datos['provincias'] = [
            'Barcelona',
            'Girona',
            'Lleida',
            'Tarragona',
        ];
        $datos['centro'] = $centro;

        return view('auth.admin.centros.edit', $datos);
    }

    public function update(Request $request, Centro $centro) {
        $fichero = $request->file('imagen');

        if($fichero) {
            $imagen_path = 'id_centro=' . $centro->id . '_' . $fichero->getClientOriginalName();
            //borrar fichero si existe
            if( Storage::disk('public')->exists('imagenes/centers/' . $imagen_path)){
                Storage::disk('public')->delete('imagenes/centers/' . $imagen_path);
            }
            //añadir fichero
            Storage::disk('public')->putFileAs('imagenes/centers/',$fichero,$imagen_path);
            $centro->imagen = 'imagenes/centers/' . $imagen_path;
        }

        $centro->nombre = $request->input('nombre');
        $centro->descripcion = $request->input('descripcion');
        $centro->telefono = $request->input('telefono');
        $centro->direccion = $request->input('direccion');
        $centro->codigo_postal = $request->input('codigo_postal');
        $centro->ciudad = $request->input('ciudad');
        $centro->provincia = $request->input('provincia');

        try{
            $centro->save();
            $success = __('admin/centros.success_update');
            $request->session()->flash('success', $success);
        } catch(QueryException $e) {
            $error = Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect()->action('CentroController@edit')->withInput();
        }
        return  redirect()->action('CentroController@index');
    }

    public function destroy(Centro $centro, Request $request) {
        if(Storage::disk('public')->exists('storage/' . $centro->imagen)) {
            Storage::disk('public')->delete($centro->imagen);
        }

        try {
            $centro->delete();
            $success = __('admin/centros.success_destroy');
            $request->session()->flash('success', $success);
        } catch(QueryException $ex) {
            $error = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $error);
        }

        return redirect('/centros')->withInput();
    }
}

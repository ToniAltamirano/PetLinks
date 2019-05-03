<?php

namespace App\Http\Controllers;

use App\Models\Subtipo;
use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clases\Utilitat;
use Illuminate\Database\QueryException;

class SubtipoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $subtipos = Subtipo::All();

        $datos['subtipos'] = $subtipos;
        return view('auth.admin.subtipos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tipos = Tipo::All();
        $datos['tipos'] = $tipos;
        return view('auth.admin.subtipos.new', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $subtipo = new Subtipo;
        $subtipo->nombre =  $request->input('nombre');
        $subtipo->tipos_id =  $request->input('tipo');
        if( $request->input('gama') == 1) {
            $subtipo->gama = 'Alta';
        } else if($request->input('gama') == 2) {
            $subtipo->gama = 'Media';
        } else {
            $subtipo->gama = 'Baja';
        }
        $subtipo->tipo_unidad =  $request->input('tipoUnidad');

        try {
            $subtipo->save();
            $success = __('admin/subtipos.create_success_message');
            $request->session()->flash('success', $success);
            return redirect('/subtipos')->withInput();
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect('/subtipos/create')->withInput();
        }
        //return redirect()->action('SubtipoController@index')->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tipos = Tipo::all();
        $subtipos = Subtipo::find($id);
        $datos['tipos'] = $tipos;
        $datos['subtipos'] = $subtipos;

        return view('auth.admin.subtipos.edit', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $subtipo = Subtipo::find($id);

        $subtipo->nombre =  $request->input('nombre');
        $subtipo->tipos_id =  $request->input('tipo');
        if( $request->input('gama') == 1) {
            $subtipo->gama = 'Alta';
        } else if($request->input('gama') == 2) {
            $subtipo->gama = 'Media';
        } else {
            $subtipo->gama = 'Baja';
        }
        $subtipo->tipo_unidad =  $request->input('tipoUnidad');

        try {
            $subtipo->save();
            $success = __('admin/subtipos.update_success_message');
            $request->session()->flash('success', $success);
            return redirect('/subtipos')->withInput();
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect()->action('SubtipoController@edit')->withInput();
        }
        return redirect()->action('SubtipoController@index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $subtipo = Subtipo::find($id);
        try {
            $subtipo->delete();
            $success = __('admin/subtipos.destroy_success_message');
            $request->session()->flash('success', $success);
        } catch(QueryException $ex) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
        }
        return redirect()->action('SubtipoController@index');
    }
}

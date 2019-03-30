<?php

namespace App\Http\Controllers;

use App\Models\Subtipo;
use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubtipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtipos = Subtipo::All();

        $datos['subtipos'] = $subtipos;
        return view('auth.admin.subtipos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::All();
        $datos['tipos'] = $tipos;
        return view('auth.admin.subtipos.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subtipo = new Subtipo;
        $subtipo->nombre =  $request->input('nombre');
        $subtipo->tipos_id =  $request->input('tipo');
        $subtipo->gama =  $request->input('gama');
        $subtipo->tipo_unidad =  $request->input('tipoUnidad');

        try {
            $subtipo->save();
        } catch (QueryException $e) {
            $error = "ERROR";
            $request->session()->flash('error', $error);
            return redirect('/donantes/create')->withInput();
        }
        return redirect()->action('SubtipoController@index')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function show(Subtipo $subtipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Subtipo $subtipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subtipo $subtipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subtipo = Subtipo::find($id);
        try {
            $subtipo->delete();
        } catch(QueryException $ex) {
            $error = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $error);
        }
        return redirect()->action('SubtipoController@index');
    }
}

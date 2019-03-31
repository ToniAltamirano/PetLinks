<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::all();

        $datos['tipos'] = $tipos;
        return view('auth.admin.tipos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = new Tipo();
        $tipo->nombre = $request->input('nombre');

        try {
            $tipo->save();
        } catch (QueryException $e) {
            $error = "ERROR";
            $request->session()->flash('error', $error);
            return redirect()->action('TipoController@create')->withInput();
        }
        return redirect()->action('TipoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
        $datos['tipo'] = $tipo;
        return view('auth.admin.tipos.edit', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
        $tipo->nombre = $request->input('nombre');
        try {
            $tipo->save();
        } catch (QueryException $e) {
            $error = "ERROR";
            $request->session()->flash('error', $error);
            return redirect('/donantes/edit')->withInput();
        }
        return redirect()->action('TipoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        try {
            $tipo->delete();
        } catch (QueryException $e) {
            $error = "ERROR";
            $request->session()->flash('error', $error);
        }
        return redirect()->action('TipoController@index');
    }
}

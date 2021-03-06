<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clases\Utilitat;
use Illuminate\Database\QueryException;

class TipoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tipos = Tipo::all();

        $datos['tipos'] = $tipos;
        return view('auth.admin.tipos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('auth.admin.tipos.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $tipo = new Tipo();
        $tipo->nombre = $request->input('nombre');

        try {
            $tipo->save();
            $success = __('admin/tipos.create_success');
            $request->session()->flash('success', $success);
            return redirect('/tipos')->withInput();
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect('/tipos/create')->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo) {
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
    public function update(Request $request, Tipo $tipo) {
        $tipo->nombre = $request->input('nombre');
        try {
            $tipo->save();
            $success = __('admin/tipos.edit_success');
            $request->session()->flash('success', $success);
            return redirect('/tipos')->withInput();
        } catch (QueryException $e) {
            $error = Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect()->action('TipoController@edit', $tipo)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo, Request $request) {
        try {
            $tipo->delete();
            $success = __('admin/tipos.delete_success');
            $request->session()->flash('success', $success);
        } catch (QueryException $e) {
            $error = Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
        }
        return redirect('/tipos')->withInput();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Donativo;
use App\Models\Centro;
use App\Models\Tipo;
use App\Models\Subtipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.admin.donaciones');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros = Centro::all();
        $tiposDonacion = Tipo::all();
        $subtiposDonacion = Subtipo::all();
        $datos['centros'] = $centros;
        $datos['tiposDonacion'] = $tiposDonacion;
        $datos['subtiposDonacion'] = $subtiposDonacion;
        return view('auth.admin.donations.nuevaDonacion', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donativo  $donativo
     * @return \Illuminate\Http\Response
     */
    public function show(Donativo $donativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donativo  $donativo
     * @return \Illuminate\Http\Response
     */
    public function edit(Donativo $donativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donativo  $donativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donativo $donativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donativo  $donativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donativo $donativo)
    {
        //
    }
}

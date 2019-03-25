<?php

namespace App\Http\Controllers;

use App\Models\Donante;
use App\Models\Sexo;
use App\Models\Animal;
use App\Models\TiposDonante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.admin.donantes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tiposDonacion = TiposDonante::all();
        $sexos = Sexo::all();
        $animales = Animal::all();
        $datos['sexos'] = $sexos;
        $datos['tiposDonacion'] = $tiposDonacion;
        $datos['animales'] = $animales;

        return view('auth.admin.donantes.nuevo', $datos);
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
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function show(Donante $donante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function edit(Donante $donante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donante $donante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donante $donante)
    {
        //
    }
}

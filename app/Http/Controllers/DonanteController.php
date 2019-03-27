<?php

namespace App\Http\Controllers;

use App\Models\Donante;
use App\Models\Sexo;
use App\Models\Animal;
use App\Models\TiposDonante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

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

        $donante = new Donante;
        //campo id
        $donante->tipos_donantes_id = $request->input('tipoDonacion');
        $donante->es_habitual = $request->input('habitual');

        //particular - empresa
        if( $donante['tipos_donante_id'] == 1){
            $donante->nombre = $request->input('nombre');
        }else{
            $donante->nombre = $request->input('razon_social');
        }

        $donante->apellidos = $request->input('apellidos');

        if($donante['tipos_donante_id'] == 1){
            $donante->cif = $request->input('dni');
        }else{
            $donante->cif = $request->input('cif');
        }

        $donante->sexos_id = $request->input('sexo');
        $donante->tiene_animales = $request->input('tieneAnimales');

        //General
        $donante->direccion = $request->input('direccion');
        $donante->telefono = $request->input('telefono');
        $donante->correo = $request->input('email');

        if( $request->input('vincleEntitatSelect') == 1){
            $donante->vinculo_entidad = $request->input('vincleDescripcion');
        }

        //campo spam
        if($request->input('spam')){
            $donante->spam = $request->input('spam');
        }else{
            $donante->spam = 0;
        }

        $donante->poblacion = $request->input('poblacio');
        $donante->pais = $request->input('pais');
        $donante->es_colaborador = $request->input('colaborador');
        if($request->input('colaborador') == 1){
            $donante->tipo_colaboracion = $request->input('tipusColaborador');
        }
        $donante->fecha_alta = Carbon::now();

        try {
            $donante->save();
        } catch (QueryException $e) {
            $error = "ERROR";
            $request->session()->flash('error', $error);
            return redirect('/donantes/create')->withInput();
        }

        //Tipos animales
        $animales = $request->input('animales');
        $donante->animal()->attach($animales);

        // try {
        //     $donante->save();
        //     // return redirect('/donantes');
        // } catch (QueryException $e) {
        //     $error = "ERROR";
        //     $request->session()->flash('error', $error);
        //     return redirect('/donantes/create')->withInput();
        // }

        return redirect()->action('DonanteController@index')->withInput();;
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Donante
     */
    protected function insertar(array $data) {
        return Donante::create([
            'tipos_donante_id' => $data['tipos_donante_id'],
            'es_habitual' => $data['es_habitual'],

            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'cif' => $data['cif'],
            'sexos_id' => $data['sexos_id'],
            'tiene_animales' => $data['tiene_animales'],


            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'correo' => $data['correo'],
            'vinculo_entidad' => $data['vinculo_entidad'],

            'spam' => $data['spam'],

            'poblacion' => $data['poblacion'],
            'pais' => $data['pais'],
            'es_colaborador' => $data['es_colaborador'],
            'tipo_colaboracion' => $data['tipo_colaboracion'],
            'fecha_alta' => $data['fecha_alta']
        ]);
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

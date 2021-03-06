<?php
namespace App\Http\Controllers;

use App\Models\Donante;
use App\Models\Sexo;
use App\Models\Animal;
use App\Models\TiposDonante;
use App\Models\TipoColaborador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

use App\Clases\Utilitat;
use Illuminate\Database\QueryException;

class DonanteController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $donantes = Donante::All();

        $datos['donantes'] = $donantes;
        return view('auth.admin.donantes.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tiposDonacion = TiposDonante::all();
        $sexos = Sexo::all();
        $animales = Animal::all();
        $tipoColaborador = TipoColaborador::all();

        $datos['sexos'] = $sexos;
        $datos['tiposDonacion'] = $tiposDonacion;
        $datos['animales'] = $animales;
        $datos['tipoColaboradores'] = $tipoColaborador;

        return view('auth.admin.donantes.new', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $donante = new Donante;
        //campo id
        $donante->tipos_donantes_id = $request->input('tipoDonacion');
        $donante->es_habitual = $request->input('habitual');

        //particular - empresa
        if( $request->input('tipoDonacion') == 2) {
            $donante->nombre = $request->input('nombre');
        } else {
            $donante->nombre = $request->input('razon_social');
        }

        $donante->apellidos = $request->input('apellidos');

        if($request->input('tipoDonacion') == 2) {
            $donante->cif = $request->input('dni');
        } else{
            $donante->cif = $request->input('cif');
        }

        $donante->sexos_id = $request->input('sexo');
        $donante->tiene_animales = $request->input('tieneAnimales');

        //General
        $donante->direccion = $request->input('direccion');
        $donante->telefono = $request->input('telefono');
        $donante->correo = $request->input('email');

        if( $request->input('vincle') == 1) {
            $donante->vinculo_entidad = $request->input('vincleDescripcion');
        }

        //campo spam
        if($request->input('spam')) {
            $donante->spam = $request->input('spam');
        } else {
            $donante->spam = 0;
        }

        $donante->poblacion = $request->input('poblacio');
        $donante->pais = $request->input('pais');
        $donante->es_colaborador = $request->input('colaborador');

        if($request->input('colaborador') == 1) {
            $donante->tipo_colaboracion = $request->input('tipusColabo');
        }
        $donante->fecha_alta = Carbon::now()->timezone('Europe/Madrid');

        try {
            $donante->save();

            //Tipos animales
            $animales = $request->input('animales');
            $donante->animal()->attach($animales);

            $success = __('admin/donantes.create_success_message');
            $request->session()->flash('success', $success);

            return redirect('/donantes')->withInput();
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);

            return redirect('/donantes/create')->withInput();
        }

        // try {
        //     $donante->save();
        //     // return redirect('/donantes');
        // } catch (QueryException $e) {
        //     $error = "ERROR";
        //     $request->session()->flash('error', $error);
        //     return redirect('/donantes/create')->withInput();
        // }

        //return redirect()->action('DonanteController@index')->withInput();;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $donante = Donante::find($id);

        $tiposDonacion = TiposDonante::all();
        $sexos = Sexo::all();
        $animales = Animal::all();
        $tipoColaborador = TipoColaborador::all();
        $datos['sexos'] = $sexos;
        $datos['tiposDonaciones'] = $tiposDonacion;
        $datos['animales'] = $animales;
        $datos['donantes_animales'] = array_pluck($donante->animal, 'id');
        $datos['tipoColaboradores'] = $tipoColaborador;
        $datos['donante'] = $donante;

        // print_r($datos);
        // exit();

        return view('auth.admin.donantes.edit', $datos);
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
    public function update(Request $request, $id) {
        $donante = Donante::find($id);

        $donante->tipos_donantes_id = $request->input('tipoDonacion');
        $donante->es_habitual = $request->input('habitual');

        //particular - empresa
        if( $request->input('tipoDonacion') == 2) {
            $donante->nombre = $request->input('nombre');
        } else {
            $donante->nombre = $request->input('razon_social');
        }

        $donante->apellidos = $request->input('apellidos');

        if($request->input('tipoDonacion') == 2) {
            $donante->cif = $request->input('dni');
        } else {
            $donante->cif = $request->input('cif');
        }

        $donante->sexos_id = $request->input('sexo');
        $donante->tiene_animales = $request->input('tieneAnimales');

        //General
        $donante->direccion = $request->input('direccion');
        $donante->telefono = $request->input('telefono');
        $donante->correo = $request->input('email');

        if( $request->input('vincle') == 1) {
            $donante->vinculo_entidad = $request->input('vincleDescripcion');
        }

        //campo spam
        if($request->input('spam')) {
            $donante->spam = $request->input('spam');
        } else {
            $donante->spam = 0;
        }

        $donante->poblacion = $request->input('poblacio');
        $donante->pais = $request->input('pais');
        $donante->es_colaborador = $request->input('colaborador');

        if($request->input('colaborador') == 1) {
            $donante->tipo_colaboracion = $request->input('tipusColabo');
        }
        $donante->fecha_alta = Carbon::now();

        try {
            $donante->save();

            //Tipos animales
            $donante->animal()->detach();
            $animales = $request->input('animales');
            $donante->animal()->attach($animales);

            $success = __('admin/donantes.update_success_message');
            $request->session()->flash('success', $success);

            return redirect('/donantes')->withInput();
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect()->action('DonanteController@edit')->withInput();
        }
        //return redirect()->action('DonanteController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request) {
        $donante = Donante::find($id);
        $donante->animal()->detach();

        try {
            $donante->delete();
            $success = __('admin/donantes.destroy_success_message');
            $request->session()->flash('success', $success);
        } catch(QueryException $ex) {
            $error = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $error);
        }
        return redirect()->action('DonanteController@index');
    }

    public function checkDonante($dni_cif, $nombre, $apellidos, $email, $telefono){
        $donantes;

        try{
            $donantes = Donante::where('cif', 'LIKE', '%'.$dni_cif.'%')
                                ->orWhere('nombre', 'LIKE', '%'.$nombre.'%')
                                ->orWhere('apellidos', 'LIKE', '%'.$apellidos.'%')
                                ->orWhere('correo', 'LIKE', '%'.$email.'%')
                                ->orWhere('telefono', 'LIKE', '%'.$telefono.'%')
                                ->get();
            return $donantes;
        }
        catch(QueryException $ex){
            return null;
        }
    }
}

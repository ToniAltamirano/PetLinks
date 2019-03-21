<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// Own imports
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UsuarioController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = Usuario::All();

        $datos['users'] = $users;

    return view('auth.admin.usuarios', $datos);
    }

       /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'nombre_usuario' => ['required', 'string', 'max:45'],
            'correo' => ['required', 'string', 'email', 'max:45', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:45', 'confirmed'],
            'roles_id' => ['required'],
            'nombre' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45']

        ])->validate();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function insertar(array $data) {
        return Usuario::create([
            'nombre_usuario' => $data['nombre_usuario'],
            'correo' => $data['correo'],
            'password' => Hash::make($data['password']),
            'roles_id' => $data['roles_id'],
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('auth.admin.usuarios.nuevoUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $user['nombre_usuario'] = $request->input('nombreUsuario');
        $user['correo'] = $request->input('correo');
        $user['password'] = $request->input('password');
        $user['password_confirmation'] = $request->input('repeatPassword');
        $user['nombre'] = $request->input('nombre');
        $user['apellidos'] = $request->input('apellidos');
        $user['roles_id'] = $request->input('rol');


        if ($user['password'] === $user['password_confirmation']) {
            if (validator($user)) {
                try {
                    $this->insertar($user);
                    return redirect('/fdsgfsd');
                } catch (QueryException $e) {
                    $error = "ERROR";
                    $request->session()->flash('error', $error);

                    return redirect('/usuarios/create')->withInput();
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario) {
        //
    }
}

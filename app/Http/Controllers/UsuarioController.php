<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// Own imports
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsuarioController extends Controller {
    public function index() {
        $users = Usuario::All();
        $datos['users'] = $users;

        return view('auth.admin.usuarios.usuarios', $datos);
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'nombre_usuario' => ['required', 'string', 'max:45'],
            'email' => ['required', 'string', 'email', 'max:45', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:45', 'confirmed'],
            'roles_id' => ['required'],
            'nombre' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45']

        ])->validate();
    }

    protected function insertar(array $data) {
        return Usuario::create([
            'nombre_usuario' => $data['nombre_usuario'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles_id' => $data['roles_id'],
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
        ]);
    }

    public function create() {

        $rols = Rol::All();
        $datos['rols'] = $rols;
        return view('auth.admin.usuarios.nuevoUsuario', $datos);
    }

    public function store(Request $request) {

        $user = new Usuario();
        $user->nombre_usuario = $request->input('nombreUsuario');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->nombre = $request->input('nombre');
        $user->apellidos = $request->input('apellidos');
        $user->roles_id = $request->input('rol');

        if ($request->input('password') === $request->input('repeatPassword')) {
            try {
                //$this->insertar($user);
                $user->save();

                $success = __('admin/campañas.create_success_message');
                $request->session()->flash('success', $success);

                return redirect('/usuarios')->withInput();
            } catch (QueryException $e) {

                $error= Utilitat::errorMessage($e);
                $request->session()->flash('error', $error);

                return redirect('/usuarios/create')->withInput();
            }
        }else{
            $error = 'Contraseñas no coincidien';
            $request->session()->flash('error', $error);

            return redirect('/usuarios/create')->withInput();
        }
    }

    public function show(Usuario $usuario) {
        //
    }

    public function edit($id) {
        $usuario = Usuario::find($id);
        $datos['usuario'] = $usuario;
        $rols = Rol::All();
        $datos['rols'] = $rols;

        return view('auth.admin.usuarios.edit', $datos);
    }

    public function update(Request $request, $id) {
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->input('name');
        $usuario->apellidos = $request->input('apellidos');
        $usuario->roles_id = $request->input('roles_id');
        $usuario->nombre_usuario = $request->input('nombreUsuario');
        $usuario->email = $request->input('email');

        try{
            $usuario->save();
            $success = 'Modificado correctamente!';
            $request->session()->flash('success', $success);
            return redirect('/usuarios')->withInput();
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);

            return redirect()->action('UsurioController@edit')->withInput();
            //return redirect('/usuarios' + '/' + $usuario->id + '/edit')->withInput();
        }


        return redirect()->action('UsuarioController@index');
    }

    public function destroy($id) {

        $usuario = Usuario::find($id);

        try{
            $usuario->delete();
            $success = 'Borrado correctamente';
            $request->session()->flash('success', $success);         
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
        }

        return redirect()->action('UsuarioController@index');

    }
}

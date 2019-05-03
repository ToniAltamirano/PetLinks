<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// Own imports
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
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
    protected function create(array $data) {
        return Usuario::create([
            'nombre_usuario' => $data['nombre_usuario'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles_id' => $data['roles_id'],
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
        ]);
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $user['nombre_usuario'] = $request->input('nombreUsuario');
        $user['email'] = $request->input('email');
        $user['password'] = $request->input('password');
        $user['password_confirmation'] = $request->input('repeatPassword');
        $user['nombre'] = $request->input('nombre');
        $user['apellidos'] = $request->input('apellidos');
        $user['roles_id'] = $request->input('rol');


        if ($user['password'] === $user['password_confirmation']) {
            if (validator($user)) {
                try {
                    $this->create($user);
                    return redirect('/usuarios');
                } catch (QueryException $e) {
                    $error = "ERROR";
                    $request->session()->flash('error', $error);

                    return redirect('/usuarios/create')->withInput();
                }
            }
        }
    }

    public function checkUser($nombre_usuario) {
        $encontrado = "false";
        $usuario = Usuario::where('nombre_usuario', $nombre_usuario)
                            ->first();

        if ($usuario != null) {
            $encontrado = "true";
        }

        echo $encontrado;
    }
}

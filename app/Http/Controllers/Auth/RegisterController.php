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
            'correo' => $data['correo'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $user['nombre_usuario'] = $request->input('nombre_usuario');
        $user['correo'] = $request->input('correo');
        $user['password'] = $request->input('password');
        $user['password_confirmation'] = $request->input('password_confirmation');

        if ($user['password'] === $user['password_confirmation']) {
            if (validator($user)) {
                try {
                    $this->create($user);

                    return redirect('/');
                } catch (QueryException $e) {
                    $error = "ERROR";
                    $request->session()->flash('error', $error);

                    return redirect('/register')->withInput();
                }
            }
        }
    }
}

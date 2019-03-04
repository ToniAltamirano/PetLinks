<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request->input('inputUsername');
        $email = $request->input('inputEmail');
        $password1 = $request->input('inputPassword');
        $password2 = $request->input('inputPassword2');

        echo $username . '<br>';
        echo $email . '<br>';
        echo $password1 . '<br>';
        echo $password2 . '<br>';

        if($password1 === $password2){
            echo "son iguales <br>";
            // Genera una clave aleatoria
            function generarClave() {
                $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
                $nueva_clave = "";
                for ($i = 5; $i < 35; $i++) {
                    $nueva_clave .= $caracteres[rand(5,35)];
                };
                return $nueva_clave;
            };

            //Obtiene un valor aleatorio desde la función
            $clave_aleatoria = generarClave();

            //Definimos un número del 04 al 31
            $valor = "09";

            //Añade los valores a la sintaxis de la salt
            $salt = '$2y$'.$valor.'$'.$clave_aleatoria.'$';

            //Resultado final, encriptando la contraseña correcta (input) y añadiendo el salt de Blowfish
            $claveConSalt = crypt($password1, $salt);
            echo $claveConSalt;

            //codigo para comprovar si la contraseña coincide con la contraseña encriptada. Esto es para el login
            /*if(password_verify($password, $claveConSalt)) {
                echo 'Correcto';
            } else {
                echo 'Incorrecto';
            };*/
        }
        else{
            //Si las contraseñas no coinciden volvemos a la vista del registro. Mejor comprobar con JS
            return view('register');
        }

        /*DB::table('usuarios')->insert(
            ['nombre_usuario' => $username,
            'correo' => $email,
            'password' => $password1,
            'roles_id' => 1]
        );*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}

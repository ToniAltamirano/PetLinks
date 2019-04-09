<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;

use Illuminate\Support\Carbon;

class AdminController extends Controller {
    public function index(){

        // $users = Usuario::All();

        // $datos['users'] = $users;

        return view('auth.admin.admin'/*, $datos*/);
    }

    public function grDonacionesIndex() {
        $mes = Carbon::now()->timezone('Europe/Madrid')->format('m');
        $año = Carbon::now()->timezone('Europe/Madrid')->year;

        $datos['fecha_actual'] = $año . "-" . $mes;
        $datos['fecha_anterior'] = ($año - 1) . "-" . $mes;
        return view('auth.admin.graficos.gr_donations', $datos);
    }

    public function grDonacionesTransparencia() {
        $mes = Carbon::now()->timezone('Europe/Madrid')->format('m');
        $año = Carbon::now()->timezone('Europe/Madrid')->year;

        $datos['fecha_actual'] = $año . "-" . $mes;
        $datos['fecha_anterior'] = ($año - 1) . "-" . $mes;
        return view('transparencia', $datos);
    }
}

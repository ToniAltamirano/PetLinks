<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;

class AdminController extends Controller {
    public function index(){

        $users = Usuario::All();

        $datos['users'] = $users;

        return view('auth.admin.admin', $datos);
    }
}

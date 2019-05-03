<?php

namespace App\Http\Controllers\Api;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsuarioResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class UserController extends Controller {
    public function roles(){
        $donantes_roles = Usuario::select('roles_id')->get();
        $roles = Rol::all();

        $data['donantes_roles'] = $donantes_roles;
        $data['roles'] = $roles;

        return new UsuarioResource($data);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Donante;
use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DonanteResource;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class DonanteController extends Controller {
    public function animales_donante(){
        $donantes_animal = Donante::select('id')->with('animal')->get();
        $animales = Animal::all();

        $data['donantes_animal'] = $donantes_animal;
        $data['animales'] = $animales;

        return new DonanteResource($data);
    }
}

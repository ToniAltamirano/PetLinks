<?php

namespace App\Http\Controllers;

use App\Models\Patron;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Database\QueryException;
use App\Clases\Utilitat;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PatronController extends Controller {
    public function index() {
        $patrons = Patron::All();
        $datos['patrons'] = $patrons;

        return view('auth.admin.patrons.index', $datos);
    }

    public function create() {
        return view('auth.admin.patrons.new');
    }

    public function store(Request $request) {
        $patron = new Patron();

        $patron->nombre = $request->input('nombre');
        $patron->url = $request->input('url');

        $fichero = $request->file('imagen');

        try {
            $patron->save();

            if($fichero) {
                $imagen_path = "Patron_" . $patron->id . "." . $fichero->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('imagenes/patrons/', $fichero, $imagen_path);

                $patron->imagen = 'imagenes/patrons/' . $imagen_path;
                $patron->save();
            }

            return redirect('/patrons');
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);

            return redirect()->action('PatronController@create')->withInput();
        }
    }

    public function edit(Patron $patron) {
        $datos['patron'] = $patron;

        $file = Storage::disk('public')->get($patron->imagen);

        return view('auth.admin.patrons.edit', $datos)->with('file', $file);
    }

    public function update(Request $request, Patron $patron) {
        $patron->nombre = $request->input('nombre');
        $patron->url = $request->input('url');

        $fichero = $request->file('imagen');

        try {
            if($fichero){
                if( Storage::disk('public')->exists($patron->imagen)){
                    Storage::disk('public')->delete($patron->imagen);
                }
                $imagen_path = "Patron_" . $patron->id . "." . $fichero->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('imagenes/patrons/', $fichero, $imagen_path);

                $patron->imagen = 'imagenes/patrons/' . $imagen_path;
            }

            $patron->save();

            return redirect('/patrons');
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);

            return redirect()->action('PatronController@edit')->withInput();
        }
    }

    public function destroy(Patron $patron) {
        if(Storage::disk('public')->exists('imagenes/patrons/' . $patron->imagen)){
            Storage::disk('public')->delete($patron->imagen);
        }

        try {
            $patron->delete();
        } catch(QueryException $ex) {
            $error = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $error);
        }

        return redirect('/patrons');
    }
}

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

    public function indexPublic() {
        $patrons = Patron::All();
        $datos['patrons'] = $patrons;

        return view('info.macropadrins', $datos);
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
                $imagen_path = "Patreon_" . $patron->id . "." . $fichero->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('imagenes/patreons/', $fichero, $imagen_path);

                $patron->imagen = 'imagenes/patreons/' . $imagen_path;
                $patron->save();
            }

            $success = __('admin/macropadrins.create_success_message');
            $request->session()->flash('success', $success);

            return redirect('/patrons')->withInput();
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);

            return redirect()->action('PatronController@create')->withInput();
        }
    }

    public function edit(Patron $patron) {
        $datos['patron'] = $patron;

        return view('auth.admin.patrons.edit', $datos);
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
                $imagen_path = "Patreon_" . $patron->id . "." . $fichero->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('imagenes/patreons/', $fichero, $imagen_path);

                $patron->imagen = 'imagenes/patreons/' . $imagen_path;
            }

            $patron->save();

            $success = __('admin/macropadrins.update_success_message');
            $request->session()->flash('success', $success);

            return redirect('/patrons')->withInput();;
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);

            return redirect()->action('PatronController@edit')->withInput();
        }
    }

    public function destroy(Request $request, Patron $patron) {
        if(Storage::disk('public')->exists('imagenes/patreons/' . $patron->imagen)){
            Storage::disk('public')->delete($patron->imagen);
        }

        try {
            $patron->delete();
            $success = __('admin/macropadrins.destroy_success_message');
            $request->session()->flash('success', $success);
        } catch(QueryException $ex) {
            $error = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $error);
        }

        return redirect('/patrons')->withInput();
    }
}

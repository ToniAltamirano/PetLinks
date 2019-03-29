<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Database\QueryException;
use App\Clases\Utilitat;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CampaignController extends Controller {
    public function index() {
        $campaigns = Campaign::All();
        $datos['campaigns'] = $campaigns;

        return view('auth.admin.campaigns.index', $datos);
    }

    public function create() {
        return view('auth.admin.campaigns.new');
    }

    public function store(Request $request) {
        $campaign = new Campaign();

        $campaign->titulo_ca = $request->input('titulo_ca');
        $campaign->titulo_en = $request->input('titulo_en');
        $campaign->titulo_es = $request->input('titulo_es');
        $campaign->subtitulo_ca = $request->input('subtitulo_ca');
        $campaign->subtitulo_en = $request->input('subtitulo_en');
        $campaign->subtitulo_es = $request->input('subtitulo_es');
        $campaign->url = $request->input('url');

        $fichero = $request->file('imagen');

        try {
            $campaign->save();

            if($fichero) {
                $imagen_path = $campaign->id . "_" . $campaign->titulo_ca . "." . $fichero->getClientOriginalExtension();
                Storage::disk('ftp')->putFileAs('imagenes/campaigns/', $fichero, $imagen_path);

                $campaign->imagen = 'imagenes/campaigns/' . $imagen_path;
                $campaign->save();
            }

            return redirect('/campaigns');
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);

            return redirect('/campaigns/create')->withInput();
        }
    }

    public function edit(Campaign $campaign) {
        $datos['campaign'] = $campaign;

        return view('auth.admin.campaigns.edit', $datos);
    }

    public function update(Request $request, Campaign $campaign) {
        $campaign->titulo_ca = $request->input('titulo_ca');
        $campaign->titulo_en = $request->input('titulo_en');
        $campaign->titulo_es = $request->input('titulo_es');
        $campaign->subtitulo_ca = $request->input('subtitulo_ca');
        $campaign->subtitulo_en = $request->input('subtitulo_en');
        $campaign->subtitulo_es = $request->input('subtitulo_es');
        $campaign->url = $request->input('url');

        $fichero = $request->file('imagen');

        try {
            if($fichero){
                if( Storage::disk('ftp')->exists($campaign->imagen)){
                    Storage::disk('ftp')->delete($campaign->imagen);
                }
                $imagen_path = $campaign->id . "_" . $campaign->titulo_ca . "." . $fichero->getClientOriginalExtension();
                Storage::disk('ftp')->putFileAs('imagenes/campaigns/', $fichero, $imagen_path);

                $campaign->imagen = 'imagenes/campaigns/' . $imagen_path;
            } else {
                // RENAME ARCHIVO CON ID Y TITULO NUEVOS.
            }

            $campaign->save();

            return redirect('/campaigns');
        } catch (QueryException $e) {
            $error= Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);

            return redirect()->action('CampaignController@edit')->withInput();
        }
    }

    public function destroy(Campaign $campaign) {
        if(Storage::disk('ftp')->exists('imagenes/campaigns/' . $campaign->imagen)){
            Storage::disk('ftp')->delete($campaign->imagen);
        }

        try {
            $campaign->delete();
        } catch(QueryException $ex) {
            $error = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $error);
        }

        return redirect('/campaigns');
    }
}

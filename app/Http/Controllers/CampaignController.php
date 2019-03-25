<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $campaigns = Campaign::All();
        $datos['campaigns'] = $campaigns;

        return view('auth.admin.campaigns.campaigns', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('auth.admin.campaigns.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $campaign['titulo_ca'] = $request->input('titulo_ca');
        $campaign['titulo_en'] = $request->input('titulo_en');
        $campaign['titulo_es'] = $request->input('titulo_es');
        $campaign['subtitulo_ca'] = $request->input('subtitulo_ca');
        $campaign['subtitulo_en'] = $request->input('subtitulo_en');
        $campaign['subtitulo_es'] = $request->input('subtitulo_es');
        $campaign['url'] = $request->input('url');
        $campaign['imagen'] = $request->input('imagen');

        try {

        } catch (QueryException $e) {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign) {
        //
    }
}

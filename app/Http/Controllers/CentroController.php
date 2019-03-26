<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CentroController extends Controller {

    public function index() {
        $centros = Centro::All();
        $datos['centros'] = $centros;

        return view('auth.admin.centros.index', $datos);
    }

    public function indexPublico() {
        $centros = Centro::All();
        $datos['centros'] = $centros;

        return view('info.centres', $datos);
    }

    public function create() {
        return view('auth.admin.centros.create');
    }

    public function store(Request $request) {
        //
    }

    public function show(Centro $centro) {
        //
    }

    public function edit(Centro $centro) {
        //
    }

    public function update(Request $request, Centro $centro) {
        //
    }

    public function destroy(Centro $centro) {
        //
    }
}

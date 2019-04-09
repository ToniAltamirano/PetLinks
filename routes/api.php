<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('donaciones/donante/check/', 'DonanteController');
//Route::get('donaciones/donante/check/{cif_dni}', 'DonanteController@checkDonante');
Route::get('donacion/tipos', 'Api\DonativoController@tipo_donacion');
Route::get('donacion/subtipos', 'Api\DonativoController@subtipos_donacion');
Route::get('donacion/balance/{fechaInicio}/{fechaFinal}', 'Api\DonativoController@dinero_donaciones');
Route::get('donacion/tipos/{fechaInicio}/{fechaFinal}', 'Api\DonativoController@tipos_fecha');

Route::get('donante/animales', 'Api\DonanteController@animales_donante');

Route::get('usuario/roles', 'Api\UserController@roles');

Route::get('centro/destino', 'Api\CentroController@centros_destino');

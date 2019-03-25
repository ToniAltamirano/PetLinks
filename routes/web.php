<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('index');
});

// LOGIN
Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// REGISTER
Route::get('/register', 'Auth\RegisterController@showRegister')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register/check/{nombre_usuario}', 'Auth\RegisterController@checkUser');

// ADMIN
// Route::get('/admin', 'AdminController@index');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/admin', 'AdminController@index');
    // Route::get('/usuarios', 'UsuarioController@index');
});

// INFO
Route::get('/info/centres', 'CentroController@indexPublico');
Route::get('/info/horaris', function(){
    return view('info.horaris');
});
Route::get('/info/contacta', function(){
    return view('info.contacta');
});
Route::get('/info/spam', function(){
    return view('info.spam');
});
Route::get('/info/daina', function(){
    return view('info.daina');
});
Route::get('/info/macropadrins', function(){
    return view('info.macropadrins');
});
Route::get('/info/avis-legal', function(){
    return view('info.avis-legal');
});
Route::get('/info/politica-privacitat', function(){
    return view('info.politica-privacitat');
});

//RESET PASSWORD
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// OTHERS
// Route::get('/donaciones', function(){
//     return view('auth.admin.donaciones');
// });
Route::get('/donantes', function(){
    return view('auth.admin.donantes');
});
Route::get('/landing', function(){
    return view('auth.admin.landing');
});
// Route::get('/usuarios', 'UsuarioController@index');

Route::resource('/donaciones', 'DonativoController');
Route::resource('/usuarios', 'UsuarioController');
Route::resource('/campaigns', 'CampaignController');

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
});

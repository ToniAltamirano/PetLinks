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

Route::get('/', 'CampaignController@indexPublico');
Route::get('/transparencia', 'AdminController@grDonacionesTransparencia');

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
Route::get('/info/contacta', 'ContactUsController@index');
Route::post('info/contacta', 'ContactUsController@store')->name('contactus.store');

Route::get('/info/spam', function(){
    return view('info.spam');
});
Route::get('/info/daina', function(){
    return view('info.daina');
});
Route::get('/info/macropadrins', 'PatronController@indexPublic');
Route::get('/info/avis-legal', function(){
    return view('info.avis-legal');
});
Route::get('/info/politica-privacitat', function(){
    return view('info.politica-privacitat');
});

//RESET PASSWORD
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request');

// OTHERS
// Route::get('/donaciones', function(){
//     return view('auth.admin.donaciones');
// });
Route::get('/donantes', function(){
    return view('auth.admin.donantes.donantes');
});

Route::get('donaciones/donante/check/{dni_cif}/{nombre}/{apellidos}/{email}/{telefono}', 'DonanteController@checkDonante');

Route::get('/landing', function(){
    return view('auth.admin.landing');
});

Route::get('/usuarios', 'UsuarioController@index');

Route::resource('/donaciones', 'DonativoController');
Route::resource('/usuarios', 'UsuarioController');
Route::resource('/campaigns', 'CampaignController');
Route::resource('/donantes', 'DonanteController');
Route::resource('/centros', 'CentroController');
Route::resource('/patrons', 'PatronController');
Route::resource('/subtipos', 'SubtipoController');
Route::resource('/tipos', 'TipoController');

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
});

Route::get('toggler/{theme}', function ($theme) {
    if ($theme == "dark") {
        Session::put('theme-dark', true);
    } else {
        Session::put('theme-dark', false);
    }
    return redirect()->back();
});

//GRAFICOS
Route::get('/graficos/donaciones', 'AdminController@grDonacionesIndex');
Route::get('/graficos/donantes', function(){
    return view('auth.admin.graficos.gr_donors');
});
Route::get('/graficos/usuarios', function(){
    return view('auth.admin.graficos.gr_users');
});
Route::get('/graficos/centros', function(){
    return view('auth.admin.graficos.gr_centers');
});
Route::get('/certificate', function(){
    return view('certificate');
});

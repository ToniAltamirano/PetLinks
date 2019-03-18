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

Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegister')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register/check/{nombre_usuario}', 'Auth\RegisterController@checkUser');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', 'AdminController@index');
});

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
});

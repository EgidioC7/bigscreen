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

Route::get('/', 'FrontController@index');

Auth::routes();

Route::get('administration', function () {
    return redirect()->action('HomeController@index');
});

Route::resource('administration/dashboard', 'HomeController')->middleware('auth');

Route::resource('administration/home', 'SurveyController')->middleware('auth');

Route::post('/', 'FrontController@store');

Route::get('/{link}', 'FrontController@anwser');


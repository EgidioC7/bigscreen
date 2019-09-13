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

Route::resource('administration/home', 'HomeController')->middleware('auth');

Route::get('administration/survey', 'HomeController@show_questions');

Route::get('administration/answer', 'HomeController@show_answers');

Route::post('/', 'FrontController@store');

Route::get('/{link}', 'FrontController@anwser');


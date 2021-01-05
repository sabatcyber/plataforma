<?php


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index');

	Auth::routes();
        // Route named "admin::dashboard"
Route::get('/home', 'HomeController@index')->name('home');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cad_alunos', 'HomeController@cad_alunos')->name('cad_alunos');
Route::get('/cidades/{id}', 'HomeController@cidades');
Route::get('/responsaveis', 'HomeController@responsaveis')->name('responsaveis');
<?php


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index');

	Auth::routes();
        // Route named "admin::dashboard"
Route::get('/home', 'HomeController@index')->name('home');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/estados', 'HomeController@estados')->name('estados');
Route::get('/cidades/{id}', 'HomeController@cidades');
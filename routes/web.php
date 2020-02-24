<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/create','UserController@create')->name('create');
Route::post('/user/store','UserController@store')->name('store');
Route::get('/user/{id}/edit','UserController@edit')->name('edit');
Route::post('/user/update','UserController@update')->name('update');
Route::delete('/user/delete','UserController@delete')->name('delete');
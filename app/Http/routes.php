<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::resource('TaskCrud','TaskCrudController');
Route::get('ClientesCrud/filter',['as' => 'filter', 'uses' => 'ClientesCrudController@filter']);
Route::resource('ClientesCrud','ClientesCrudController');
Route::resource('ProveedoresCrud','ProveedoresCrudController');
Route::resource('EmpleadosCrud','EmpleadosCrudController');

Route::get('/home', 'HomeController@index');

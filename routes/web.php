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
    return view('front_office.preparation');
});
Route::get('back_office', function () {
    return view('back_office.index');
});


Route::resource('ingredients' , 'IngredientsController', ['except' => ['destroy']]);
Route::get('/ingredients/{ingredient}/destroy', 'IngredientsController@destroy');


Route::resource('boissons' , 'BoissonsController', ['except' => ['destroy']]);
Route::get('/boissons/{boisson}/destroy', 'BoissonsController@destroy');


Route::get('/recipes/create/{boisson}', 'RecipesController@createForOne');
Route::resource('recipes' , 'RecipesController');
//
//Route::get('/boissons/index', 'BoissonsController@index');
//Route::get('/boissons/create', 'BoissonsController@create');
//Route::post('/boissons/store', 'BoissonsController@store');
//Route::get('/boissons/{boisson}/update', 'BoissonsController@update');
//Route::get('/boissons/{boisson}', 'BoissonsController@show');


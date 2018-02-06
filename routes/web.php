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

Route::get('ingredients/sorts/{column}/{order}', 'IngredientsController@sort');
Route::resource('ingredients' , 'IngredientsController');

Route::get('boissons/sorts/{column}/{order}', 'BoissonsController@sort');
Route::resource('boissons' , 'BoissonsController');

Route::resource('recipes' , 'RecipesController', ['only' => [
    'edit', 'update', 'destroy'
]]);
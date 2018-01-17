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

Route::get('/', function()
{
    return view('front_office.preparation');
});
Route::get('back_office', function()
{
    return view('back_office.index');
});

Route::get('recettes', function()
{
    return view('back_office.recettes');
});

Route::get('pieces', 'controller_pieces@list');

Route::get('boissons', 'DrinkController@listDrink');

Route::get('stocks','Controller_Stock@display_stock');

Route::get('commandes', 'CommandeController@listCommande');


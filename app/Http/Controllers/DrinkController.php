<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrinkController extends Controller
{
     function listDrink(){
    	$boisson = array ('Long Coffee', 'Expresso', 'Chocolate ', 'Tea ', 'Macchiato');
    	
		return view('back_office/boissons', ['boisson'=> $boisson]);

	}
}


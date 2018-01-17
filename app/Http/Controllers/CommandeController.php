<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
     function listCommande(){
    	$commande = ['N° commande'=> '00001',
    				'Date'=> '01-01-2017', 
    				'Heure '=> '10:00', 
    				'Boisson' => 'chocolate', 
    				'Prix'=> 50, 
    				'Somme insérée'=> 100, 
    				'Somme rendue'=>50];
    	
		return view('back_office/commandes', ['commande'=> $commande]);

	}
}


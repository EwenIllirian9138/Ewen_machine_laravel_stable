<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_Stock extends Controller
{
    Function display_stock()

    {
        $Stock_Ingre =array(
            array('Nom'=>'Cafe','Quantite'=>'20'),
            array('Nom'=>'Chocolat','Quantite'=>'20'),
            array('Nom'=>'Lait','Quantite'=>'20'),
            array('Nom'=>'Sucre','Quantite'=>'20'),
            array('Nom'=>'Gobelet','Quantite'=>'20'),
            array('Nom'=>'touillette','Quantite'=>'20'),
            array('Nom'=>'The','Quantite'=>'20'),
            array('Nom'=>'Eau','Quantite'=>'20')

        );
        $resultat ="";
        foreach ($Stock_Ingre as $ligne) {
            foreach ($ligne as $key => $valeur) {
                $resultat .= ' : ' . $valeur;
            }
        }
        return view('back_office.stocks', ['resultat'=> $resultat]);

    }
}

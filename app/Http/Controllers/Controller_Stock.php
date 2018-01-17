<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_Stock extends Controller
{
    Function display_stock()

    {
        $id_ingredients=0;
        $stock_ingre = [
            'Cafe' => 20,
            'Chocolat' => 10,
            'Lait' => 20,
            'Sucre' => 15,
            'Gobelet' => 7,
            'Touillette' => 5,
            'The' => 6,
            'Eau' => 18,
        ];

        return view('back_office.stocks', ['stock_Ingre' => $stock_ingre, 'i' => $id_ingredients]);

    }
}
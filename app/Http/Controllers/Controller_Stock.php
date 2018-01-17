<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_Stock extends Controller
{
    Function display_stock()

    {
        $i=0;
        $Stock_Ingre = [
            'Cafe' => 20,
            'Chocolat' => 20,
            'Lait' => 20,
            'Sucre' => 20,
            'Gobelet' => 20,
            'Touillette' => 20,
            'The' => 20,
            'Eau' => 20,
        ];

        return view('back_office.stocks', ['Stock_Ingre' => $Stock_Ingre, 'i' => $i]);

    }
}
/*public function list()
    {
        $i=0;
        $coin_list = [
            200 => 10,
            100 => 7,
            50 => 15,
            20 => 23,
            10 => 2,
            5 => 5
        ];

        return view('back_office.pieces', ['coin_list' => $coin_list, 'i' => $i]);
    }
*/
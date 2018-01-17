<?php

namespace App\Http\Controllers;

class controller_pieces extends Controller
{
    public function list()
    {
        $coin_list = [
            200 => 10,
            100 => 7,
            50 => 15,
            20 => 23,
            10 => 2,
            5 => 5
        ];

        return view('back_office.pieces', ['coin_list' => $coin_list]);
    }
}
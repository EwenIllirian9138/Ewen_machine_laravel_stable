<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class recipesController extends BaseController
{
    function recipes()
    {
        $allrecipes = [
            "Long coffee" => [

                    "water" => 4,
                    "coffee" => 2,
                    "milk" => 0,
                    "chocolate" => 0,
                    "tea" => 0
                ],
            "Expresso" => [
                    "water" => 2,
                    "coffee" => 1,
                    "milk" => 0,
                    "chocolate" => 0,
                    "tea" => 0
                ],
            "Chocolate" => [
                    "water" => 0,
                    "coffee" => 0,
                    "milk" => 2,
                    "chocolate" => 1,
                    "tea" => 0
                ],
            "Tea" => [
                    "water" => 2,
                    "coffee" => 0,
                    "milk" => 0,
                    "chocolate" => 0,
                    "tea" => 1
                ],
            "Macchiato" => [
                    "water" => 2,
                    "coffee" => 1,
                    "milk" => 1,
                    "chocolate" => 0,
                    "tea" => 0
                ],
        ];

        return view('back_office/recettes', ['allrecipes' => $allrecipes]);
    }
}

?>
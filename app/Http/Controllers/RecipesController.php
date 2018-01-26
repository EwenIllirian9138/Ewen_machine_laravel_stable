<?php

namespace App\Http\Controllers;

use App\Boisson;
use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boissons = Boisson::select('name', 'id')->get();
        $boissons->load(['ingredients' => function ($query) {
            $query->select('ingredients.name', 'ingredients.id');
        }]);

        return view('back_office.recipes.index', ['boissons' => $boissons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boissons = Boisson::select('name', 'id')->get();
        $ingredients = Ingredient::select('name', 'id')->get();

        $data = [
            'boissons' => $boissons,
            'ingredients' => $ingredients
        ];

        return view('back_office.recipes.create', $data);
    }

    public function createForOne(Boisson $boisson)
    {
        $ingredients = Ingredient::select('name', 'id')->get();
        return view('back_office.recipes.create',
            ['boissons' => $boisson, 'ingredients' => $ingredients, 'ForOne' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boisson = Boisson::find($request->boisson);
        foreach ($request->ingredients as $ingredient_index => $ingredient_id) {
            $ingredient = Ingredient::find($ingredient_id);
            $amount = $request->amount[$ingredient_index];
            $boisson->ingredients()->attach($ingredient, ['amount' => $amount]);
        }
        return redirect('/boissons/'.$boisson->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Boisson $recipe)
    {
        $boisson = $recipe->load('ingredients');
        $ingredients = Ingredient::all();

        $data = [
            'boisson' => $boisson,
            'ingredients' => $ingredients,
        ];

        return view('back_office.recipes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $id_boisson = $recipe->boisson_id;
        $recipe->delete();
        return redirect("/boissons/".$id_boisson );
    }
}

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
    public function index() // useless
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // useless
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // useless
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe) // useless
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
        $all_ingredients = Ingredient::all();
        $all_ingredients = $all_ingredients->diff($boisson->ingredients);

        $data = [
            'boisson' => $boisson,
            'all_ingredients' => $all_ingredients,
        ];

        return view('back_office.Recipes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boisson $recipe)
    {
        $boisson = $recipe;
        unset($recipe);

        $recipe = $request->recipe_id;

        $ingredients = $request->ingredients;
        $quantity = $request->quantity;

        $new_ingredients = $request->new_ingredients;
        $new_quantity = $request->new_quantity;

        if ($recipe) {
            foreach ($recipe as $index => $recipe_id) {

                $boisson->ingredients()->updateExistingPivot($ingredient_id, $atribute);

                $current_recipe = Recipe::find($recipe_id);

                $current_recipe->boisson_id = $boisson->id;
                $current_recipe->ingredient_id = $ingredients[$index];
                $current_recipe->quantity = $quantity[$index];



                $current_recipe->save();
            }
        }

        if ($new_ingredients) {
            foreach ($new_ingredients as $index => $ingredient_id) {
                $ingredient = Ingredient::find($ingredient_id);
                $boisson->ingredients()->attach($ingredient, ['quantity' => $new_quantity[$index]]);
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->back();
    }
}

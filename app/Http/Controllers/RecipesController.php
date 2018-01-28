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
            'ingredients' => $ingredients,
        ];
        if ($ingredients->count() <= 0) {
            return view('back_office.Ingredients.create', $data);
        } else {
            return view('back_office.recipes.create', $data);
        }
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
            'all_ingredients' => $ingredients,
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
    public function update(Request $request, Boisson $recipe)
    {
        $boisson = $recipe;
        unset($recipe);

        $recipe = $request->recipe_id;
        $ingredients = $request->ingredients;
        $quantity = $request->quantity;

        $new_ingredients = $request->new_ingredients;
        $new_quantity = $request->new_quantity;

        if ($recipe && $new_ingredients) {
            $duplicate_ingredients_id = [];
            foreach ($new_ingredients as $index => $ingredient_id) {
                $response = array_search($ingredient_id, $ingredients);
                if (is_numeric($response)) {
                    $duplicate_ingredients_id[$index] = $response;
                }
            }
            foreach ($duplicate_ingredients_id as $new_index => $index) {
                $quantity[$index] += $new_quantity[$new_index];
                unset($new_quantity[$new_index], $new_ingredients[$new_index]);
            }
        }

        if ($recipe) {
            foreach ($recipe as $index => $recipe_id) {
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
        return redirect("/recipes/".$boisson->id."/edit");
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
        return redirect("/recipes/".$id_boisson."/edit");
    }
}

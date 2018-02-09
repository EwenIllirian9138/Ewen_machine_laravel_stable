<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Boisson;
use App\Ingredient;
use App\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('back_office.sales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boissons = Boisson::all()->load('ingredients');

        foreach ($boissons as $key => $boisson) {
            foreach ($boisson->ingredients as $ingredient) {
                if (($ingredient->pivot->quantity) > ($ingredient->stock)) {
                    $boissons->forget($key);
                }
            }
        }

        $data = [
            'boissons' => $boissons,
        ];

        return view('front_office.sales.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'boisson_id' => request('selectDrink'),
            'user_id' => request('user')
        ];

        Sale::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function show(User $sale)
    {
        $user = $sale->load('boissons');
        return view('front_office.sales.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}

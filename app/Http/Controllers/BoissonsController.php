<?php

namespace App\Http\Controllers;

use App\Boisson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoissonsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boissons = Boisson::all();
        return view('back_office.boissons.index', ['boissons' => $boissons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_office.boissons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boisson = Boisson::create(['name' => $request->name, 'price' => $request->price]);
        return redirect()->action('RecipesController@edit', ['boisson' => $boisson]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boisson $boisson
     * @return \Illuminate\Http\Response
     */
    public function show(Boisson $boisson)
    {
        $boisson_sales = $boisson->load('sales', 'ingredients');
        return view('back_office.boissons.show', ['boisson' => $boisson_sales]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boisson $boisson
     * @return \Illuminate\Http\Response
     */
    public function edit(Boisson $boisson)
    {
        return view('back_office.boissons.edit', ['boisson' => $boisson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Boisson $boisson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boisson $boisson)
    {
        $boisson->name = $request->name;
        $boisson->price = $request->price;
        $boisson->save();
        return redirect('/boissons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boisson $boisson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boisson $boisson)
    {
        $boisson->delete();
        return redirect('/boissons');
    }
}

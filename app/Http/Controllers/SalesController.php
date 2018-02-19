<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSales;
use App\Sale;
use App\Http\Controllers\App\Preparation;
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
        $sales = Sale::all()->load('user', 'boisson');
        return view('back_office.sales.index', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
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
    public
    function store(CreateSales $request)
    {
        $boisson = Boisson::find(request('id'));
        $coins = request('coin');
        $data = [
            'boisson_id' => $boisson->id,
            'user_id' => \Auth::id(),
            'sugar' => request('selectSucre'),
        ];

        $preparation = new Preparation($boisson, $coins);

        if ($preparation->enoughMoney) {
            if ($preparation->can) {
                $preparation->store();
                Sale::create($data);
                return redirect('/coins')->with(['coins' => $preparation->renduCoins]);
            } else {
                return redirect()->back()->withErrors('Ne pourras pas rendre la monnaie');
            }

        } else {

            return redirect()->back()->withErrors('Monnaie insufisante');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public
    function show(User $sale)
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
    public
    function edit(Sale $sale)
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
    public
    function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Sale $sale)
    {
        //
    }
}

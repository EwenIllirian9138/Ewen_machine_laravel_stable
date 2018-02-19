<?php

namespace App\Http\Controllers;

use App\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'coins' => Coin::all(),
        ];
        return view('back_office.coins.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coin $coin
     * @return \Illuminate\Http\Response
     */
    public function show(Coin $coin)
    {
        $data = [
            'coin' => $coin,
        ];
        return view('back_office.coins.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coin $coin
     * @return \Illuminate\Http\Response
     */
    public function edit(Coin $coin)
    {
        $data = [
            'coin' => $coin,
        ];
        return view('back_office.coins.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Coin $coin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coin $coin)
    {
        $coin->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coin $coin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coin $coin)
    {
        //
    }
}

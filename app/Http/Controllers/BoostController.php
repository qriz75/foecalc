<?php

namespace App\Http\Controllers;

use App\Boost;
use Illuminate\Http\Request;

class BoostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boosts = Boost::all();

        return view('boosts.index', [
            'boosts' => $boosts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boosts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boost = new Boost();

        $boost->boostName = request('boostName');
        

        $boost->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function show(Boost $boost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function edit(Boost $boost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boost $boost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boost $boost)
    {
        //
    }
}

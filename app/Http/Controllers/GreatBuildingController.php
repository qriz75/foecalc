<?php

namespace App\Http\Controllers;

use App\GreatBuilding;
use App\Age;
use Illuminate\Http\Request;

class GreatBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gbs = GreatBuilding::all();

        return view('gbs.index', [
            'gbs' => $gbs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ages = Age::pluck('ageShort', 'ageID');
        return view('gbs.create')->with('ages', $ages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gb = new GreatBuilding();

        $gb->gbName = request('gbName');
        $gb->ageID = request('ageID');

        $gb->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GreatBuilding  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function show(GreatBuilding $greatBuilding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GreatBuilding  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function edit(GreatBuilding $greatBuilding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GreatBuilding  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GreatBuilding $greatBuilding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GreatBuilding  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function destroy(GreatBuilding $greatBuilding)
    {
        //
    }
}

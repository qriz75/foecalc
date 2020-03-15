<?php

namespace App\Http\Controllers;

use App\GreatBuilding;
use App\Age;
use DB;
use Image;
use Illuminate\Http\Request;

class GreatBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'gbs', 'show']]);
    }

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
        $gb->gbShort = request('gbShort');
        $gb->ageID = request('ageID');
        $gb->gbDescription = request('gbDescription');
        $gb->gbImage = request('gbImage');
        
        if ($request->hasFile('gbImage'))
        {
            $file = $request->file('gbImage');
            $name = $file->getClientOriginalName();
            $publicPath = public_path();
            $imagePath = '/img/';
            $file = $file->move($publicPath . $imagePath . $name);            
            $gb->gbImage = $name;
        }

      

        $gb->save();

        return redirect('/gbs')->with('success', 'Great Building created'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GreatBuilding  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function show($gbID)
    {
        $gb = GreatBuilding::find($gbID);        
        return view('gbs.gb')->with('gb', $gb);

        return view('gbs');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GreatBuilding  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function edit($gbID)
    {
        //$ages = Age::pluck('ageShort', 'ageID');
        $gb = GreatBuilding::find($gbID);
        return view('gbs.edit')->with('gb', $gb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GreatBuilding  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gbID)
    {
        $gb = GreatBuilding::find($gbID);

        $gb->gbName = request('gbName');
        $gb->gbDescription = request('gbDescription');
        $gb->gbShort = request('gbShort');

        //$age->ageID = request('ageID');
        //$gb->gbImage = request('gbImage');

       /*  if ($request->hasFile('gbImage'))
        {
            $file = $request->file('gbImage');
            $name = $file->getClientOriginalName();
            $publicPath = public_path();
            $imagePath = '/img/';
            $file = $file->move($publicPath . $imagePath . $name);            
            $gb->gbImage = $name;
        } */

        $gb->save();

        return redirect('/gbs')->with('success', 'Great Building updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GreatBuilding  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function destroy($gb)
    {
        $gb = Boost::find($gbID);
        $gb->delete();

        return redirect('/gbs')->with('success', 'Great Building deleted');
    }
}

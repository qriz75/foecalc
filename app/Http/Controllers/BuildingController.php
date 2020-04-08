<?php

namespace App\Http\Controllers;

use App\Building;
use App\Age;
use App\Boost;
use DB;
use Image;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'buildings', 'show']]);
    }

    public function index()
    {

        $buildings = Building::all();
        $boosts = Boost::pluck('image', 'id');
        //dd($boosts);

        return view('buildings.index', [
            'buildings' => $buildings,
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

        $ages = Age::all();
        $boosts = Boost::all();
        //dd($ages);
        //dd($boosts);
        //return view('buildings.create')->with('age', $age, 'boosts', $boosts);
        return view('buildings.create', [ 'ages' => $ages, 'boosts' => $boosts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $building = new Building();
        $boosts = $request->boost;
        $building->name = request('name');
        $building->short = request('short');
        $building->age_id = request('id');
        //dd($request);
        $building->description = request('description');
        $building->image = request('image');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $imagePath = 'storage/img/buildings';
            $file = $file->move($imagePath . $name);
            $building->image = $name;
        }

        $building->save();

        //dd($boosts);
        $building->boosts()->attach($boosts);

        return redirect('/buildings')->with('success', 'Great Building created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Building  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $age = Age::pluck('short', 'id');
        $building = Building::find($id);
        $boosts = Boost::pluck('image', 'id');
        return view('buildings.building', [ 'building' => $building, 'age' => $age, 'boost' => $boosts]);

        // return view('buildings');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Building  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boosts = Boost::pluck('name', 'id');
        $age = Age::pluck('short', 'id');
        $building = Building::find($id);
        //$building->boost()->attach($boostID);
        return view('buildings.edit', [ 'building' => $building, 'ages' => $age, 'boosts' => $boosts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Building  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $building = Building::find($id);

        $building->name = request('name');
        $building->description = request('description');
        $building->short = request('short');
        $building->id = request('id');
        $building->id = request('id');
        //$building->buildingImage = request('buildingImage');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            //$publicPath = public_path();
            $imagePath = 'storage/img/buildings';
            $file = $file->move($imagePath . $name);
            $building->buildingImage = $name;
        }

        $building->save();

        return redirect('/buildings')->with('success', 'Great Building updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building  $greatBuilding
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building = Building::find($id);
        $building->delete();

        return redirect('/buildings')->with('success', 'Great Building deleted');
    }
}

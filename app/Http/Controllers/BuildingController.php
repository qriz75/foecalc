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
        $building->description = request('description');
        $building->image = request('image');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $imagePath = "public/img/buildings/";
            $file = $file->storeAs($imagePath, $name);
            $building->image = $name;
        }

        $building->save();

        $building->boosts()->attach($request->boost);

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
        $building = Building::find($id);        
        $boosts = Boost::all();
        $age = Age::all();
			  $checkeds = DB::table('boost_building')->where('building_id','=',$id)->pluck('boost_id')->toArray();

        return view('buildings.edit', [ 'building' => $building, 'ages' => $age, 'boosts' => $boosts, 'checkeds' => $checkeds]);

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
        $building->short = request('short');
        $building->age_id = request('id');
        $building->description = request('description');
        $building->image = request('image');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $imagePath = "public/img/buildings/";
            $file = $file->storeAs($imagePath, $name);
            $building->image = $name;
        }

        $building->save();
        $building->boosts()->sync($request->input('boost'));

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

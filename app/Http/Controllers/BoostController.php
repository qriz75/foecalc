<?php

namespace App\Http\Controllers;

use App\Boost;
use DB;
use Image;
use Illuminate\Http\Request;

class BoostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'boosts', 'show']]);
    }

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
        $boost->boostDescription = request('boostDescription');
        
        if ($request->hasFile('boostImage'))
        {
            $file = $request->file('boostImage');
            $name = $file->getClientOriginalName();
            $publicPath = public_path();
            $imagePath = '/img/';
            $file = $file->move($publicPath . $imagePath . $name);            
            $boost->boostImage = $name;
        }

      

        $boost->save();

        return redirect('/boosts')->with('success', 'Boost created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function show($boostID)
    {
        $boost = Boost::find($boostID);
        return view('boosts.boost')->with('boost', $boost);

        return view('boosts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function edit($boostID)
    {
        $boost = Boost::find($boostID);
          return view('boosts.edit')->with('boost', $boost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $boostID)
    {
        $boost =Boost::find($boostID);

        $boost->boostName = request('boostName');
        $boost->boostDescription = request('boostDescription');
        
       /*  if ($request->hasFile('boostImage'))
        {
            $file = $request->file('boostImage');
            $name = $file->getClientOriginalName();
            $publicPath = public_path();
            $imagePath = '/img/';
            $file = $file->move($publicPath . $imagePath . $name);            
            $boost->boostImage = $name;
        } */

        $boost->save();

        return redirect('/boosts')->with('success', 'Boost updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function destroy($boost)
    {
        $boost = Boost::find($boostID);
        $boost->delete();

        return redirect('/boost')->with('success', 'Boost deleted');
    }
}

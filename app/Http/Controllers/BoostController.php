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

        $boost->name = request('name');
        $boost->description = request('description');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $imagePath = "public/img/boosts/";
            $file = $file->storeAs($imagePath, $name);
            $boost->image = $name;
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
    public function show($id)
    {
        $boost = Boost::find($id);
        return view('boosts.boost')->with('boost', $boost);

        return view('boosts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boost = Boost::find($id);
          return view('boosts.edit')->with('boost', $boost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
     
        $boost = Boost::find($id);
        $boost->name = request('name');
        $boost->description = request('description');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $imagePath = "public/img/boosts/";
            $file = $file->storeAs($imagePath, $name);
            $boost->image = $name;
        }

        $boost->save();

        return redirect('/boosts')->with('success', 'Boost updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boost = Boost::find($id);
        $boost->delete();

        return redirect('/boost')->with('success', 'Boost deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Age;
use Image;
use DB;
use Illuminate\Http\Request;


class AgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'ages', 'show']]);
    }

    public function index()
    {
        $ages = Age::all();

        return view('ages.index', [
            'ages' => $ages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('ages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $age = new Age();

        $age->ageName = request('ageName');
        $age->ageShort = request('ageShort');
        $age->ageDescription = request('ageDescription');
        
        if ($request->hasFile('ageImage'))
        {
            $file = $request->file('ageImage');
            $name = $file->getClientOriginalName();
            $publicPath = public_path();
            $imagePath = '/img/';
            $file = $file->move($publicPath . $imagePath . $name);            
            $age->ageImage = $name;
        }

      

        $age->save();

        return redirect('/ages')->with('success', 'Age created'); 

        #dd($request->file('hqImage'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function show($ageID)
    {
        $age = Age::find($ageID);
        return view('ages.age')->with('age', $age);

        return view('ages');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function edit($ageID)
    {
        $age = Age::find($ageID);
          return view('ages.edit')->with('age', $age);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ageID)
    {
        $age =Age::find($ageID);

        $age->ageName = request('ageName');
        $age->ageShort = request('ageShort');
        $age->ageDescription = request('ageDescription');
        
       /*  if ($request->hasFile('ageImage'))
        {
            $file = $request->file('ageImage');
            $name = $file->getClientOriginalName();
            $publicPath = public_path();
            $imagePath = '/img/';
            $file = $file->move($publicPath . $imagePath . $name);            
            $age->ageImage = $name;
        } */

        $age->save();

        return redirect('/ages')->with('success', 'Age updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function destroy($ageID)
    {
        $age = Age::find($ageID);
        $age->delete();

        return redirect('/ages')->with('success', 'Age deleted');
    }
}

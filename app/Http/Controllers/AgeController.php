<?php

namespace App\Http\Controllers;

use App\Age;
use Image;
use Illuminate\Http\Request;


class AgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        
        if ($request->hasFile('ageImagePath'))
        {
            $file = $request->file('ageImagePath');
            $name = $file->getClientOriginalName();
            $file = $file->move(public_path().'/upload/ages/', $name);
            $age->ageImagePath = $file->getRealPath();
        }

        $age->save();

        return redirect('/'); 

        #dd($request->file('hqImage'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function show(Age $age)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function edit(Age $age)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Age $age)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function destroy(Age $age)
    {
        //
    }
}

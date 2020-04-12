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

        $age->name = request('name');
        $age->short = request('short');
        $age->description = request('description');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $publicPath = public_path();
            //dd($publicPath); */
            $imagePath = public_path()."/uploaded-images/ages/".$name;
            $file = $file->storeAs("app/public/images/ages/", $name);//$imagePath);
            $age->image = $name;
        }


        //dd($imagePath);
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
    public function show($id)
    {
        $age = Age::find($id);
        return view('ages.age')->with('age', $age);

        return view('ages');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $age = Age::find($id);
          return view('ages.edit')->with('age', $age);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
$log=[];
        $age =Age::find($id);

        $age->name = request('name');
        $age->short = request('short');
        $age->description = request('description');
//dd(storage_path('app'));

       if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $publicPath = public_path();
            $imagePath = public_path()."/uploaded-images/ages/".$name;
$log[] = "image path : ".var_export($imagePath, true);
            $file = $file->storeAs("public/images/ages/", $name);//$imagePath);
//            $file = $file->storeAs($imagePath);
//move($imagePath); //$publicPath . $imagePath . $name);
$log[] = "file : ".var_export($file, true);
            $age->image = $name;
            //dd($name);
        }
     



        $age->save();
$log[] = "test";
//dd($log);
        return redirect('/ages')->with('success', 'Age updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $age = Age::find($id);
        $age->delete();

        return redirect('/ages')->with('success', 'Age deleted');
    }
}

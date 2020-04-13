@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Ages in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($ages as $age)
        <div class="gridInside">

            <img src="../storage/img/ages/{{$age->image}}" alt="Age Headquarter" height="auto" width="50%">
            <div class="text-responsive"><a href="/ages/{{$age->id}}"> {{$age->short}} </a><br></div>
        </div>


@endforeach
    </div>
@endsection

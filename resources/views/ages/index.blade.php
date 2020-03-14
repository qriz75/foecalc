@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Ages in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($ages as $age)
        <div class="gridInside">
            <h2><a href="/ages/{{$age->ageID}}"> {{$age->ageShort}} </a><br></h2>    
            <img src="img/ages/{{$age->ageImage}}" alt="Age Headquarter" height="100" width="100">
        </div>        
    

@endforeach
    </div>
@endsection
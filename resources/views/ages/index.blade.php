@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Ages in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($ages as $age)
        <div class="gridInside">
            <div class="text-responsive"><a href="/ages/{{$age->ageID}}"> {{$age->ageShort}} </a><br></div>    
            <img src="img/ages/{{$age->ageImage}}" alt="Age Headquarter" height="auto" width="50%">
        </div>        
    

@endforeach
    </div>
@endsection
@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Ages in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($ages as $age)
        <div class="gridInside">
            <div class="divider-div"><hr class="divider"></div>
            <h2><a href="/ages/{{$age->ageID}}"> {{$age->ageName}} </a><br></h2>
            <h6>Short: {{$age->ageShort}}</h6>     
            <img src="img/ages/{{$age->ageImage}}" alt="Age Headquarter" height="100" width="100">
        </div>        
    </div>

@endforeach
    
@endsection
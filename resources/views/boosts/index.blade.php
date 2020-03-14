@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Boosts in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($boosts as $boost)
        <div class="gridInside">
            <h2><a href="/boosts/{{$boost->boostID}}"> {{$boost->boostName}} </a><br></h2>    
            <img src="img/boosts/{{$boost->boostImage}}" alt="Boost Image" height="100" width="100">
        </div>        
    

@endforeach
    </div>
@endsection
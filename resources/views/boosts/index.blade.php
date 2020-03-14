@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Boosts in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($boosts as $boost)
        <div class="gridInside">
            
            <img src="img/boosts/{{$boost->boostImage}}" alt="Boost Image" height="auto" width="50%">
            <div class="text-responsive"><a href="/boosts/{{$boost->boostID}}"> {{$boost->boostName}} </a><br></div>
        </div>        
    

@endforeach
    </div>
@endsection
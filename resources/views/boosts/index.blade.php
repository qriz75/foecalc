@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Boosts in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($boosts as $boost)
        <div class="gridInside">

            <img src="storage/img/boosts/{{$boost->image}}" alt="Boost Image" height="auto" width="50vh">
            <div class="text-responsive"><a href="/boosts/{{$boost->id}}"> {{$boost->name}} </a><br></div>
        </div>


@endforeach
    </div>
@endsection

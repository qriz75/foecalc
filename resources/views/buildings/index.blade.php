@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Great Buildings in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($buildings as $building)
        <div class="gridInside">
            <div class="row">
                <div class="col-8">

                    <img class="gbImage" src="storage/img/buildings/{{$building->image}}" alt="Great Building Image">
                </div>
                <div class="col-4">
                    @foreach ($building->boosts as $boost)

                        <img class="boostImage" src="storage/img/boosts/{{$boost->image}}" alt="Boost Image">

                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-responsive"><a href="/buildings/{{$building->id}}"> {{$building->short}} </a><br></div>
                </div>
            </div>






        </div>


        @endforeach
    </div>
@endsection

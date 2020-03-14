@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Great Buildings in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($gbs as $gb)
        <div class="gridInside">
            <div class="text-responsive"><a href="/gbs/{{$gb->gbID}}"> {{$gb->gbShort}} </a><br></div>    
            <img src="img/gbs/{{$gb->gbImage}}" alt="Great Building Image" height="auto" width="50%">
        </div>        
    

@endforeach
    </div>
@endsection
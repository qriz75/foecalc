@extends('layouts.app')

@section('content')

    <div class="wrapper index">
    <h1>Great Buildings in Forge of Empires</h1>
    <div class="gridOutside">
        @foreach($gbs as $gb)
        <div class="gridInside">
            <h2><a href="/gbs/{{$gb->gbID}}"> {{$gb->gbShort}} </a><br></h2>    
            <img src="img/gbs/{{$gb->gbImage}}" alt="Great Building Image" height="100" width="100">
        </div>        
    

@endforeach
    </div>
@endsection
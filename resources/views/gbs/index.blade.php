@extends('layouts.app')

@section('content')
    <div class="wrapper index">
        <h1>Great Buildings</h1>
        
    </div>
    @foreach ($gbs as $gb)
    <div>
       {{$gb->gbImage}} {{$gb->gbName}} - {{$gb->ageID}}
    </div>
@endforeach
    
@endsection
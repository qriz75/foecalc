@extends('layouts.layout')

@section('content')
    <div class="wrapper index">
        <h1>Ages</h1>
        
    </div>
    @foreach ($ages as $age)
    <div>
        {{$age->ageName}} - {{$age->ageShort}}
    </div>
@endforeach
    
@endsection
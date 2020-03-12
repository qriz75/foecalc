@extends('layouts.app')

@section('content')
    <div class="wrapper index">
        <h1>Boosts</h1>
        
    </div>
    @foreach ($boosts as $boost)
    <div>
        {{$boost->boostName}}
    </div>
@endforeach
    
@endsection
@extends('layouts.app')

@section('content')
<div >
    <h1>Create Boost:</h1>
    <form action="/boosts" method="POST">
        @csrf
    <label for="name">Boost Name:</label>
    <input type="text" id="boost" name="boostName">
    <input type="submit" value="Add">
    </form>
</div>
    
@endsection
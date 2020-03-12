@extends('layouts.app')

@section('content')
<div >
    <h1>Create Age:</h1>
    <form action="/ages" method="POST">
        @csrf
    <label for="name">Age Name:</label>
    <input type="text" id="name" name="ageName">
    <label for="short">Age Short:</label>
    <input type="text" id="short" name="ageShort">
    <input type="submit" value="Add">
    </form>
</div>
    
@endsection
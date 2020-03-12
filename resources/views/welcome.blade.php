@extends('layouts.layout')

@section('content')
    

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            <img src="img/logo.png" alt="foecalc">
        </div>

        <div class="links">
            <a href="/great_buildings">Great Buildings</a>
            <a href="/ages">Ages</a>
            <a href="/boosts">Boosts</a>
            <a href="/calculator">Calculator</a>
            <a href="/instructions">Instructions</a>
        </div>
    </div>
</div>
@endsection
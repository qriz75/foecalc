@extends('layouts.app')

@section('content')


<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/welcome') }}">Home</a>
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
            <div class="logoContainer">
            <img src="{{asset('storage/img/logo.png') }}" alt="foetools" >
        </div></div>

        <div class="links">
            <a href="/ages">Ages</a>
            <a href="/boosts">Boosts</a>
            <a href="/buildings">Great Buildings</a>
            <a href="/calculator">Calculator</a>
            <a href="https://docs.google.com/document/d/1hAANF7MgYWDYUCkSKa4uknCG8ZNC_MWnb4w7zuCT1yY/edit?usp=sharing">Instructions</a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1>Update Boost:</h1>
    {{ Form::open(['action' => [ 'BoostController@update', $boost->boostID], 'method' => 'POST', 'files' => true]) }}
        <div class="form-group">
            {{ Form::label('boostName', 'Boost Name:') }}
            {{ Form::text('boostName', $boost->boostName, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{ Form::label('boostDescription', 'Description:') }}
            {{ Form::textarea('boostDescription', $boost->boostDescription, ['class' => 'form-control'])}}
        </div>

        {{-- <div class="form-group">
            {{ Form::label('boostImage', 'Boost Image:') }}
            {{ Form::file('boostImage', $boost->boostImage, ['class' => 'form-control'])}}
        </div> --}}

        <div class="form-group">
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::submit('Update Boost', ['class' => 'btn btn-primary']) }}
        </div>

    {{Form::close()}}
</div>
    
@endsection
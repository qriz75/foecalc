@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1>Update Great Building:</h1>
    {{ Form::open(['action' => [ 'GreatBuildingController@update', $gb->gbID], 'method' => 'POST', 'files' => true]) }}
        <div class="form-group">
            {{ Form::label('gbName', 'Great Building Name:') }}
            {{ Form::text('gbName', $gb->gbName, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{ Form::label('gbDescription', 'Description:') }}
            {{ Form::textarea('gbDescription', $gb->gbDescription, ['class' => 'form-control'])}}
        </div>

        {{-- <div class="form-group">
            {{ Form::label('gbImage', 'Great Building Image:') }}
            {{ Form::file('gbImage', $gb->gbImage, ['class' => 'form-control'])}}
        </div> --}}

        <div class="form-group">
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::submit('Update Great Building', ['class' => 'btn btn-primary']) }}
        </div>

    {{Form::close()}}
</div>
    
@endsection
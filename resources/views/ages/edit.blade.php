@extends('layouts.app')

@section('content')
<div class="createContainer">
    <div class="jumbotron jumbotron-fluid">
        <div class='formOutter'>
    <h1>Update Age:</h1>
    {{ Form::open(['action' => [ 'AgeController@update', $age->ageID], 'method' => 'POST', 'files' => true]) }}
        <div class="form-group">
            {{ Form::label('ageName', 'Age Name:') }}
            {{ Form::text('ageName', $age->ageName, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{ Form::label('ageShort', 'Short Age Name:') }}
            {{ Form::text('ageShort', $age->ageShort, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{ Form::label('ageDescription', 'Description:') }}
            {{ Form::textarea('ageDescription', $age->ageDescription, ['class' => 'form-control'])}}
        </div>

        {{-- <div class="form-group">
            {{ Form::label('ageImage', 'Head Quarter Image:') }}
            {{ Form::file('ageImage', $age->ageImage, ['class' => 'form-control'])}}
        </div> --}}

        <div class="form-group">
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::submit('Update Age', ['class' => 'btn btn-primary']) }}
        </div>

        {{Form::close()}}
    </div>
</div>
</div>  
@endsection
@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1>Create Age:</h1>
    {{ Form::open(['route' => 'ages.store', 'files' => true]) }}
        <div class="form-group">
            {{ Form::label('ageName', 'Age Name:') }}
            {{ Form::text('ageName', null, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{ Form::label('ageShort', 'Short Age Name:') }}
            {{ Form::text('ageShort', null, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{ Form::label('ageDescription', 'Description:') }}
            {{ Form::textarea('ageDescription', null, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{ Form::label('ageImagePath', 'Head Quarter Image:') }}
            {{ Form::file('ageImagePath', null, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{ Form::submit('Create Age', ['class' => 'btn btn-primary']) }}
        </div>

    {{Form::close()}}
</div>
    
@endsection
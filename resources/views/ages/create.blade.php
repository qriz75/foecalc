@extends('layouts.app')

@section('content')
<div class="createContainer">
    <div class="jumbotron jumbotron-fluid">
        <div class='formOutter'>
            <h1>Create Age:</h1><h4>
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
                    {{ Form::label('ageImage', 'Head Quarter Image:') }}
                    {{ Form::file('ageImage', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::submit('Create Age', ['class' => 'btn btn-primary']) }}
                </div></h4>

            {{Form::close()}}
        </div>
    </div>
</div>  
@endsection
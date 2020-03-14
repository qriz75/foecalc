@extends('layouts.app')

@section('content')
<div class="createContainer">
    <div class="jumbotron jumbotron-fluid">
        <div class='formOutter'>
            <h1>Create Boost:</h1><h4>
            {{ Form::open(['route' => 'boosts.store', 'files' => true]) }}
                <div class="form-group">
                    {{ Form::label('boostName', 'Boost Name:') }}
                    {{ Form::text('boostName', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('boostDescription', 'Description:') }}
                    {{ Form::textarea('boostDescription', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('boostImage', 'Thumbnail:') }}
                    {{ Form::file('boostImage', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::submit('Create Boost', ['class' => 'btn btn-primary']) }}
                </div></h4>

            {{Form::close()}}
        </div>
    </div>
</div>  
@endsection
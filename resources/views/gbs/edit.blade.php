@extends('layouts.app')

@section('content')
<div class="createContainer">
    <div class="jumbotron jumbotron-fluid">
        <div class='formOutter'>
            <h1>Edit Great Building:</h1><h4>
            {{ Form::open(['route' => 'gbs.store', 'files' => true]) }}
                <div class="form-group">
                    {{ Form::label('gbName', 'Great Building Name:') }}
                    {{ Form::text('gbName', $gb->gbName, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('gbShort', 'Short Name:') }}
                    {{ Form::text('gbShort', $gb->gbShort, ['class' => 'form-control'])}}
                </div>

                {{-- <div class="form-group">
                    {{ Form::label('ageShort', 'Building Age:') }}
                    {{ Form::select('ageID',$ages,null,['class' => 'required form-control select2','ageID'=>'ageShort'])}}
                </div>   --}} 

                <div class="form-group">
                    {{ Form::label('gbDescription', 'Description:') }}
                    {{ Form::textarea('gbDescription', $gb->gbDescription, ['class' => 'form-control'])}}
                </div>

                {{-- <div class="form-group">
                    {{ Form::label('gbImage', 'Thumbnail:') }}
                    {{ Form::file('gbImage', $gb->gbImage, ['class' => 'form-control'])}}
                </div> --}}

                <div class="form-group">
                    {{ Form::submit('Edit Great Building', ['class' => 'btn btn-primary']) }}
                </div></h4>

            {{Form::close()}}
        </div>
    </div>
</div>  
@endsection
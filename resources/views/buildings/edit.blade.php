@extends('layouts.app')

@section('content')
<div class="createContainer">
    <div class="jumbotron jumbotron-fluid">
        <div class='formOutter'>
            <h1>Edit Great Building:</h1><h4>
                <form action="{{ route('buildings.store') }}" method="post"enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <label for="name">Great Building Name</label>
                    <input type="text" class="form-control" id="buildingName" name="name" value="{{ $building->name }}">
                    </div>
                    <div class="form-group">
                        <label for="short">Short Building Name</label>
                        <input type="text" class="form-control" id="buildingShort" name="short" value="{{ $building->short }}">
                    </div>

                    <div class="form-group">
                        <label for="ageShort">Building Age</label>
                        <select class="form-control" name="id">
                            @foreach ($ages as $age)
                                <option value="{{ $age->id }}"> {{ $age->short }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="boostName">Boosts</label>
                        <div class="boostSelector">
                            @foreach ($boosts as $boost)
                                <div class="singleBoost">
                                    <img src="/storage/img/boosts/{{ $boost['image'] }}"  alt="{{$boost->name}}" title="{{$boost->name}} --> {{$boost->description}}" height="60px">
                                    <input type="checkbox" name="boost[]" value="{{ $boost->id }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="buildingDescription" name="description" rows="5">{{ $building->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Thumbnail</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Building</button>
                    </div></h4>
                </form>

                {{-- {{ Form::open(['action' => [ 'BuildingController@update', $building->id], 'method' => 'POST', 'files' => true]) }}
                <div class="form-group">
                    {{ Form::label('name', 'Great Building Name:') }}
                    {{ Form::text('name', $building->name, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('short', 'Short Name:') }}
                    {{ Form::text('short', $building->short, ['class' => 'form-control'])}}
                </div>

               <div class="form-group">
                    {{ Form::label('ageShort', 'Building Age:') }}
                    {{ Form::select('id',$ages, $building->id ,['class' => 'required form-control select2','ageID'=>'ageShort'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('boostName', 'Boost') }}
                    {{ Form::select('boostID',$boosts, $building->boostID ,['class' => 'required form-control select2','boostID'=>'boostName'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('buildingDescription', 'Description:') }}
                    {{ Form::textarea('buildingDescription', $building->buildingDescription, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('buildingImage', 'Thumbnail:') }}
                    {{ Form::file('buildingImage', $building->buildingImage, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::hidden('_method', 'PUT')}}
                    {{ Form::submit('Edit Great Building', ['class' => 'btn btn-primary']) }}
                </div></h4>

            {{Form::close()}} --}}
        </div>
    </div>
</div>
@endsection

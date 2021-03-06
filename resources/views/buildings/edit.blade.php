@extends('layouts.app')

@section('content')
<div class="createContainer">
    <div class="jumbotron jumbotron-fluid">
        <div class='formOutter'>
            <h1>Edit Great Building:</h1><h4>
                <form action="{{ route('buildings.update', $building->id) }}" method="post"enctype="multipart/form-data">
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
                                  @if (in_array($boost->id, $checkeds))
                                    <input type="checkbox" name="boost[]" value="{{ $boost->id }}" checked="true"> 
                                  @elseif (!in_array($boost->id, $checkeds))
                                  <input type="checkbox" name="boost[]" value="{{ $boost->id }}" >
                                  
                                  @endif
                                  
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
                  <img src="/storage/img/buildings/{{ $building->image}}" height="50" width="50">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Building</button>
                      <input name="_method" type="hidden" value="PUT">
                    </div></h4>
                    
                </form>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="createContainer">
    <div class="jumbotron jumbotron-fluid">
        <div class='formOutter'>
    <h1>Update Age:</h1>
    <form  method="post" action="{{ route('ages.update', $age->id) }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">Age Name</label>
            <input type="text" class="form-control" id="ageName" name="name" value="{{ $age->name}}">
            </div>
            <div class="form-group">
                <label for="short">Short Age Name</label>
                <input type="text" class="form-control" id="ageShort" name="short" value="{{ $age->short}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="ageDescription" name="description" rows="5" >{{ $age->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Thumbnail</label>
                <input type="file" name="image" class="form-control" value="{{ $age->image }}">
            </div>
        <img src="/storage/img/ages/{{ $age->image}}" height="50" width="50">
            <div class="form-group">
            <button type="submit" class="btn btn-primary" >Update Building</button>
            </div></h4>
            <input name="_method" type="hidden" value="PUT">
        </form>
    </div>
</div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="createContainer">
    <div class="jumbotron jumbotron-fluid">
        <div class='formOutter'>
    <h1>Update Boost:</h1>
    <form  method="post" action="{{ route('boosts.update', $boost->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Boost Name</label>
            <input type="text" class="form-control" id="boostName" name="name" value="{{ $boost->name}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="boostDescription" name="description" rows="5">{{ $boost->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Thumbnail</label>
            <input type="file" name="image" class="form-control">
        </div>
        <img src="/storage/img/boosts/{{ $boost->image}}" height="50" width="50">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Boost</button>
            <input name="_method" type="hidden" value="PUT">
        </div></h4>

    </form>

</div>

@endsection


@extends('layouts.app')

@section('content')
<div class="createContainer">
    <div class="jumbotron jumbotron-fluid">
        <div class='formOutter'>
            <h1>Create Boost:</h1><h4>
                <form action="{{route('boosts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Boost Name</label>
                        <input type="text" class="form-control" id="boostName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="boostDescription" name="description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Thumbnail</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create Boost</button>
                    </div></h4>
                </form>
        </div>
    </div>
</div>
@endsection

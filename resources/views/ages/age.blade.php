@extends('layouts.app') @section('content')

<div class="container">
  <div class="backdrop">
    <div class="well">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-8">

            <img src="/storage/img/ages/{{$age->image}}" alt="Age Headquarter">
            <div class="name"><h1>{{$age->name}}<h1></div>
                <div class="name"><h4>is commonly abbreviated as: <br>{{$age->short}}<h4></div>
        </div>
            <div class="col-xs-12 col-sm-8 col-lg-4">
              <div class="description"><h4>{{$age->description}}</h4></div>

            </div>

      </div>
      <div class="row">
        <div class="col-6">

        </div>
        <div class="col-6">

        </div>
      </div>
      <div class="row">


      </div>
      <div class="row">
        <div class="col">

          Created: {{$age->created_at}}<br>
          Updated: {{$age->updated_at}}<br>
        </div>
          </div><br>
        <div class="row">
          <a type="button" href="/ages" class="btn btn-primary" role="button">Go Back</a>
          @if(!Auth::guest())
          @if(Auth::user()->role == 'admin')
          <a type="button" href="/ages/{{$age->id}}/edit" class="btn btn-default" role="button">Edit</a>
        <form method="POST" action="/ages/{{$age->id}}">
            @csrf
            {{ method_field('DELETE') }}
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Delete Age">
            </div>
        </form>

          @endif
          @endif
        </div>
    </div>
  </div>
</div>
@endsection

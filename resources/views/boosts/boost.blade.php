@extends('layouts.app') @section('content')

<div class="container">
  <div class="backdrop">
    <div class="well">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-8">

            <img src="../storage/img/boosts/{{$boost->image}}" alt="Boost Image">
            <div class="name"><h1>{{$boost->name}}<h1></div>

        </div>
            <div class="col-xs-12 col-sm-8 col-lg-4">
              <div class="description"><h4>{{$boost->description}}</h4></div>

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

          Created: {{$boost->created_at}}<br>
          Updated: {{$boost->updated_at}}<br>
        </div>
          </div><br>
        <div class="row">
          <a type="button" href="/boosts" class="btn btn-primary" role="button">Go Back</a>
          @if(!Auth::guest())
          @if(Auth::user()->role == 'admin')
          <a type="button" href="/boosts/{{$boost->id}}/edit" class="btn btn-default" role="button">Edit</a> <form method="POST" action="/boosts/{{$boost->id}}">
            @csrf
            {{ method_field('DELETE') }}
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Delete Boost">
            </div>
        </form>
          @endif
          @endif
        </div>
    </div>
  </div>
</div>
@endsection

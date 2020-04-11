@extends('layouts.app') @section('content')

<div class="container">
  <div class="backdrop">
    <div class="well">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-8">
          <div class="name"><h2>{{$building->name}} - {{$building->short}}</h2></div>
            <div class="age"><h4>{{$building->age->name}}</h4></div>
            <?php //dd($boost); ?>
            <img src="../storage/img/buildings/{{$building->image}}" alt="Great Building Image"></div>


            <div class="col-xs-12 col-sm-8 col-lg-4">
              <div class="boosts">
                  @foreach ($building->boosts as $boost)
                      <img src="../storage/img/boosts/{{$boost->image}}" alt="Great Building Image" height="50vh">
                  @endforeach

              </div>


              </div>
              <div class="description"><h4>{{$building->description}}</h4></div>
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

          Created: {{$building->created_at}}<br>
          Updated: {{$building->updated_at}}<br>
        </div>
          </div><br>
        <div class="row">
          <a type="button" href="/buildings" class="btn btn-primary" role="button">Go Back</a>
          @if(!Auth::guest())
          @if(Auth::user()->role == 'admin')
          <a type="button" href="/buildings/{{$building->id}}/edit" class="btn btn-default" role="button">Edit</a>
          <form method="POST" action="/buildings/{{$building->id}}">
            @csrf
            {{ method_field('DELETE') }}
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Delete Building">
            </div>
        </form>
          @endif
          @endif
        </div>
    </div>
  </div>
</div>
@endsection

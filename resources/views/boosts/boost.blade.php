@extends('layouts.app') @section('content')

<div class="container">
  <div class="backdrop">
    <div class="well">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-8">
          
            <img src="../img/boosts/{{$boost->boostImage}}" alt="Age Headquarter">
            <div class="boostName"><h1>{{$boost->boostName}}<h1></div>
                
        </div>
            <div class="col-xs-12 col-sm-8 col-lg-4">
              <div class="boostDescription"><h4>{{$boost->boostDescription}}</h4></div>
            
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
          <a type="button" href="/boosts/{{$boost->boostID}}/edit" class="btn btn-default" role="button">Edit</a> {!!Form::open(['action' => ['BoostController@destroy', $boost->boostID], 'method' => 'POST', 'class' => 'pull-right'])!!} {{Form::hidden('_method',
          'DELETE')}} {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} {!!Form::close()!!} 
          @endif
          @endif
        </div>      
    </div>
  </div>
</div>
@endsection
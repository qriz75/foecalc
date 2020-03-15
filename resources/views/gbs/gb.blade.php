@extends('layouts.app') @section('content')

<div class="container">
  <div class="backdrop">
    <div class="well">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-8">
          
            <img src="../img/gbs/{{$gb->gbImage}}" alt="Great Building Image">
            <div class="gbName"><h1>{{$gb->gbName}}<h1></div>
            <div class="gbAge"><h4>{{$gb->ageID}}</h4></div> 
                
        </div>
            <div class="col-xs-12 col-sm-8 col-lg-4">
              <div class="gbDescription"><h4>{{$gb->gbDescription}}</h4></div>
            
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
            
          Created: {{$gb->created_at}}<br>     
          Updated: {{$gb->updated_at}}<br>          
        </div>
          </div><br>
        <div class="row">
          <a type="button" href="/gbs" class="btn btn-primary" role="button">Go Back</a>
          @if(!Auth::guest())
          @if(Auth::user()->role == 'admin')          
          <a type="button" href="/gbs/{{$gb->gbID}}/edit" class="btn btn-default" role="button">Edit</a> 
          {!!Form::open(['action' => ['GreatBuildingController@destroy', $gb->gbID], 'method' => 'POST', 'class' => 'pull-right'])!!} {{Form::hidden('_method',
          'DELETE')}} {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} {!!Form::close()!!} 
          @endif
          @endif
        </div>      
    </div>
  </div>
</div>
@endsection
@extends('layouts.app') @section('content')

<div class="container">
  <div class="backdrop">
    <div class="well">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-8">
          
            <img src="../img/ages/{{$age->ageImage}}" alt="Age Headquarter">
            <div class="ageName"><h1>{{$age->ageName}}<h1></div>
                <div class="ageShort"><h4>is commonly abbreviated as: <br>{{$age->ageShort}}<h4></div>
        </div>
            <div class="col-xs-12 col-sm-8 col-lg-4">
              <div class="ageDescription"><h4>{{$age->ageDescription}}</h4></div>
            
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
          <a type="button" href="/ages/{{$age->ageID}}/edit" class="btn btn-default" role="button">Edit</a> {!!Form::open(['action' => ['AgeController@destroy', $age->ageID], 'method' => 'POST', 'class' => 'pull-right'])!!} {{Form::hidden('_method',
          'DELETE')}} {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} {!!Form::close()!!} 
          @endif
          @endif
        </div>      
    </div>
  </div>
</div>
@endsection
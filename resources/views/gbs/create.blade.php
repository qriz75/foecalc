@extends('layouts.app')

@section('content')
<div >
    <h1>Create Great Building:</h1>
    <form action="/gbs" method="POST">
        @csrf
    <label for="gbName">Building Name:</label>
    <input type="text" id="gbName" name="gbName">
    <label for="ageShort">Building Age:</label>
    
    {{  Form::select('ageID',$ages,null,['class' => 'required form-control select2','ageID'=>'ageShort']) }}

    <input type="submit" value="Add">
    </form>
</div>
    
@endsection
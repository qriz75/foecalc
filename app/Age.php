<?php

namespace App;
use GreatBuildings;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $table = 'ages';
    protected $fillable = ['ageName','ageShort','ageDescription','ageImage'];

    public $primaryKey = 'ageID';

    public function GreatBuildings()
   {
          return $this->hasMany('App\GreatBuilding', 'ageID', 'ageID'); 
    }
    
}

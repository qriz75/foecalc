<?php

namespace App;

use Age;
use Illuminate\Database\Eloquent\Model;

class GreatBuilding extends Model
{
    protected $table = 'gbs';
    protected $fillable = ['gbName','gbShort', 'gbDescription','gbImage'];

    public $primaryKey = 'gbID';

    
    public function age(){
        return $this->belongsTo('App\Age', 'ageID', 'ageID');
    }

}

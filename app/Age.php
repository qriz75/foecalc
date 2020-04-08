<?php

namespace App;
use Buildings;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $table = 'ages';
    protected $fillable = ['name','short','description','image'];

    public $primaryKey = 'id';

    public function Buildings()
   {
          return $this->hasMany(Building::class);
    }

}

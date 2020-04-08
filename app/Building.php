<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'buildings';
    protected $fillable = ['name','short', 'description','image'];

    public $primaryKey = 'id';


    public function age(){
        return $this->belongsTo(Age::class);
    }

    public function boosts()
    {
        return $this->belongsToMany(Boost::class);
    }

}

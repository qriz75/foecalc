<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Boost extends Model
{
    protected $table = 'boosts';
    protected $fillable = ['name','description','image'];

    public $primaryKey = 'id';

    public function buildings()
    {
        return $this->belongsToMany(Building::class);
    }

}

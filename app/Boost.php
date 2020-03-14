<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boost extends Model
{
    protected $table = 'boosts';
    protected $fillable = ['boostName','boostDescription','boostImage'];

    public $primaryKey = 'boostID';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GreatBuilding extends Model
{
    protected $table = 'gbs';
    protected $fillable = ['gbName','gbShort', 'gbDescription','gbImage'];

    public $primaryKey = 'gbID';
}

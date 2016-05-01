<?php

namespace App;

use App\State;
use App\WorkCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Citie extends Model
{

    use SoftDeletes;
    
    // Relaciones one to many
	public function workCenters()
    {
    	return $this->hasMany(WorkCenter::class);
    } // workCenters()

    public function state()
    {
        return $this->belongsTo(State::class);
    } // state()

}

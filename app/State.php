<?php

namespace App;

use App\Citie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
	
    use SoftDeletes;

    // Relaciones one to many
    public function cities()
    {
    	return $this->hasMany(Citie::class);
    } // cities()
}

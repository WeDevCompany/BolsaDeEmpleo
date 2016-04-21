<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{

	use SoftDeletes;

	protected $fillable = [
       'name', 'cif', 'web', 'description', 'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    } // user()

    public function manyWorkCenters()
    {
    	return $this->hasMany(WorkCenter::class, 'workCenters');
    } // manyWorkCenters()
}

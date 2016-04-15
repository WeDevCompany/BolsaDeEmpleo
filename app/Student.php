<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

	use SoftDeletes;

	protected $fillable = [
       'firstName', 'lastName', 'dni', 'nre', 'phone', 'road',
       'address', /*'curriculum',*/ 'birthdate', 'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    } // user()

    public function manyCycles()
    {
    	return $this->belongsToMany('\App\Cycle', 'studentCycles')
    			->withPivot('cycle_id');
    } // manyCycles()

}

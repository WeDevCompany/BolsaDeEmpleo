<?php

namespace App;

use App\Cycle;
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

    public function cycles()
    {
        return $this->belongsToMany(Cycle::class, 'studentCycles')->withPivot('cycle_id');
    } // cycles()

} // Student

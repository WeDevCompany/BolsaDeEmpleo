<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycle extends Model
{
    use SoftDeletes;

    /*public function manyStudents()
    {
    	return $this->belongsToMany('\App\Student', 'studentCycles')
    			->withPivot('student_id');
    } // manyStudents()*/
}

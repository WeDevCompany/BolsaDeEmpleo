<?php

namespace App;

use App\Student;
use App\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifiedStudent extends Model
{
    use SoftDeletes;

    public $table = 'verifiedStudents';
}

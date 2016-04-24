<?php

namespace App;

use App\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifiedTeacher extends Model
{
    use SoftDeletes;

    public $table = 'verifiedTeachers';
}

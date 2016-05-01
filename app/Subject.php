<?php

namespace App;

use App\Cycle;
use App\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    
    use SoftDeletes;

    // Relaciones many to many
	public function cycles()
    {
        return $this->belongsToMany(Cycle::class, 'cycleSubjects')->withPivot('cycle_id');
    } // cycles()

	public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'subjectTeachers')->withPivot('teacher_id');
    } // teachers()

}

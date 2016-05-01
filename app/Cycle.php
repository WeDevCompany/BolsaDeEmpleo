<?php

namespace App;

use App\Student;
use App\Subject;
use App\Teacher;
use App\ProfFamilie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycle extends Model
{

    use SoftDeletes;

    // Relaciones one to many
    public function profFamilie()
    {
        return $this->belongsTo(ProfFamilie::class);
    } // profFamilie()

    // Relaciones many to many
    public function teachers()
    {
    	return $this->belongsToMany(Teacher::class, 'tutors')->withPivot('teacher_id');
    } // teachers()

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'cycleSubjects')->withPivot('subject_id');
    } // subjects()

    public function students()
    {
        return $this->belongsToMany(Student::class, 'studentCycles')->withPivot('student_id');
    } // students()
}

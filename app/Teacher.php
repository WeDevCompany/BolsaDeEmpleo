<?php

namespace App;

use App\Cycle;
use App\JobOffer;
use App\ProfFamilie;
use App\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{

    use SoftDeletes;

	protected $fillable = [
       'firstName', 'lastName', 'dni', 'phone', 'user_id',
    ];
 
    // Relaciones one to many
    public function admins()
    {
        return $this->hasMany(Self::class, 'verifiedTeachers')->withPivot('admin_id');
    } // admins()

    public function teacher()
    {
        return $this->hasMany(Self::class, 'verifiedTeachers')->withPivot('teacher_id');
    } // teacher()

    public function jobOffers()
    {
        return $this->belongsTo(Student::class, 'verifiedOffers')->withPivot('jobOffer_id');
    } // jobOffers()

    public function student()
    {
        return $this->belongsTo(Student::class, 'verifiedStudents')->withPivot('student_id');
    } // student()
    
    // Relaciones many to many
    public function cycles()
    {
        return $this->belongsToMany(Cycle::class, 'tutors')->withPivot('cycle_id');
    } // cycles()

	public function posts()
    {
        return $this->belongsToMany(JobOffer::class, 'comments')->withPivot('jobOffer_id');
    } // posts()

    public function receiveEmails()
    {
        return $this->belongsToMany(JobOffer::class, 'sentEmails')->withPivot('jobOffer_id');
    } // receiveEmails()

    public function subjets()
    {
        return $this->belongsToMany(Subject::class, 'subjectTeachers')->withPivot('subject_id');
    } // subjets()

    public function profFamilies()
    {
    	return $this->belongsToMany(ProfFamilie::class, 'teacherProfFamilies')->withPivot('profFamilie_id');
    } // profFamilies()

}

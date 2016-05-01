<?php

namespace App;

use App\Cycle;
use App\JobOffer;
use App\Teacher;
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

    // Relaciones one to one
    public function user()
    {
    	return $this->hasOne(User::class);
    } // user()

    // Relaciones one to many
    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'verifiedStudents')->withPivot('teacher_id');
    } // teachers()

    // Relaciones many to many
    public function cycles()
    {
        return $this->belongsToMany(Cycle::class, 'studentCycles')->withPivot('cycle_id');
    } // cycles()

    public function jobOffers()
    {
        return $this->belongsToMany(JobOffer::class, 'suscriptions')->withPivot('jobOffer_id');
    } // jobOffers()

} // Student

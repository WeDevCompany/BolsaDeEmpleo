<?php

namespace App;

use App\Cycle;
use App\JobOffer;
use App\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfFamilie extends Model
{
	use SoftDeletes;

	public $table = 'profFamilies';

    // Relaciones one to many
    public function cycles()
    {
    	return $this->hasMany(Cycle::class);
    } // cycles()

    public function jobOffers()
    {
    	return $this->hasMany(JobOffer::class);
    } // jobOffers()

    // Relaciones many to many
    public function teachers()
    {
    	return $this->belongsToMany(Teacher::class, 'teacherProfFamilies')->withPivot('teacher_id');
    } // teachers()

}

<?php

namespace App;

use App\EnterpriseResponsable;
use App\ProfFamilie;
use App\Student;
use App\Tags;
use App\Teacher;
use App\WorkCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobOffer extends Model
{

	use SoftDeletes;

	public $table = 'jobOffers';

    // Relaciones one to many
    public function profFamilie()
    {
        return $this->belongsTo(ProfFamilie::class);
    } // profFamilie()

    public function workCenter()
    {
        return $this->belongsTo(WorkCenter::class);
    } // workCenter()

    public function enterpriseResponsable()
    {
        return $this->belongsTo(EnterpriseResponsable::class);
    } // enterpriseResponsable()

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'verifiedOffers')->withPivot('teacher_id');
    } // teachers()

    // Relaciones many to many
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'offerTags')->withPivot('tag_id');
    } // tags()

    public function comments()
    {
        return $this->belongsToMany(Teacher::class, 'comments')->withPivot('teacher_id');
    } // comments()

    public function sentEmails()
    {
        return $this->belongsToMany(Teacher::class, 'sentEmails')->withPivot('teacher_id');
    } // sentEmails()

    public function students()
    {
        return $this->belongsToMany(Student::class, 'suscriptions')->withPivot('student_id');
    } // students()

    // Funcion para filtar por varios campos
    public function scopeFilter($query, $filter, $name)
    {
        if(isset($filter) && trim($filter) != ""){

            if($filter == 'lugar') {
                $query->where('cities.name',"LIKE", "%$name%");
            }  else if($filter == 'description') {
                $query->where('jobOffers.description',"LIKE", "%$name%");
            } else if($filter == 'offer') {
                $query->where('title',"LIKE", "%$name%");
            } else if ($filter == 'enterprise') {
                $query->where('enterprises.name',"LIKE", "%$name%");
            } else if ($filter == 'duration') {
                $query->where('duration',"LIKE", "%$name%");
            } else if ($filter == 'kind') {
                $query->where('kind',"LIKE", "%$name%");
            } else if ($filter == 'experience') {
                $query->where('experience',"LIKE", "%$name%");
            } else if ($filter == 'level') {
                $query->where('level',"LIKE", "%$name%");
            }
        }
    } // scopeFilter()

    // Funcion que compara la familia profesional del profesor y la oferta para filtrar
    public function scopeProfFamilyTeacher($query, $profFamilyTeacher)
    {

        if ($profFamilyTeacher) {
            $query->whereIn('profFamilies.name', $profFamilyTeacher);
        }
    } // scopeProfFamilyTeacher()

}

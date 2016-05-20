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

    // Funcion que obtiene las opciones del campo road
    public function Road()
    {
        // Consulta en la que obtenemos el enumerado completo
        $type = \DB::select( \DB::raw("SHOW COLUMNS FROM students LIKE 'road'") )[0]->Type;

        preg_match('/^enum\((.*)\)$/', $type, $matches);

        $enum = array();

        foreach(explode(',', $matches[1]) as $value){
            $v = trim($value, "'");
            $enum = array_add($enum, $v, $v);
        }

        return $enum;
    }// Road()

    // Funcion que obtiene el nombre completo del estudiante
    public function getFullNameAttribute()
    {
        return $this->firstName . ' ' . $this->lastName;
    } // getFullNameAttribute()

    // Funcion para buscar un estudiante por nombre
    public function scopeName($query, $name)
    {
        if(trim($name) != ""){
            $query->where(\DB::raw("CONCAT(firstName, ' ', lastName)"),"LIKE", "%$name%");
        }
    } // scopeName()

    // Funcion que compara la familia profesional del profesor y el alumno ppara filtrar
    public function scopeProfFamilyTeacher($query, $profFamilyTeacher)
    {
        if ($profFamilyTeacher) {
            $query->whereIn('profFamilies.name', $profFamilyTeacher);
        }
    } // scopeProfFamilyTeacher()

} // Student

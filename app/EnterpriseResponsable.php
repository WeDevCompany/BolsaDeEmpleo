<?php

namespace App;

use App\JobOffer;
use App\WorkCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnterpriseResponsable extends Model
{

    use SoftDeletes;

    protected $fillable = [
       'firstName', 'lastName', 'dni',
    ];

    public $table = 'enterpriseResponsables';

    // Relaciones one to many
    public function jobOffers()
    {
    	return $this->hasMany(JobOffer::class);
    } // jobOffers()

    // Relaciones many to many
    public function workCenters()
    {
        return $this->belongsToMany(WorkCenter::class, 'enterpriseCenterResponsables')->withPivot('workCenter_id');
    } // workCenters()

    // Funcion que obtiene el nombre completo
    public function getFullNameAttribute()
    {
        return $this->firstName . ' ' . $this->lastName;
    } // getFullNameAttribute()

    // Funcion para filtar por varios campos
    public function scopeFilter($query, $filter, $name)
    {
        if(isset($filter) && trim($filter) != ""){

            if($filter == 'dni') {
                $query->where('dni',"LIKE", "%$name%");
            } else if($filter == 'workCenter') {
                $query->where('workCenter.name',"LIKE", "%$name%");
            } else if($filter == 'name') {
                $query->where(\DB::raw("CONCAT(firstName, ' ', lastName)"),"LIKE", "%$name%");
            }
        }
    } // scopeFilter()
}

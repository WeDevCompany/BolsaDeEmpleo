<?php

namespace App;

use App\JobOffer;
use App\WorkCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnterpriseResponsable extends Model
{
    
    use SoftDeletes;
	
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

}

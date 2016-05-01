<?php

namespace App;

use App\Citie;
use App\Enterprise;
use App\JobOffer;
use App\enterpriseResponsable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkCenter extends Model
{
    
    use SoftDeletes;
    
    public $table = 'workCenters';
    
    // Relaciones one to many
    public function citie()
    {
        return $this->belongsTo(Citie::class);
    } // citie()

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    } // jobOffers()

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    } // enterprise()

    // Relaciones many to many
    public function enterpriseResponsables()
    {
        return $this->belongsToMany(enterpriseResponsable::class, 'enterpriseCenterResponsables')->withPivot('enterpriseResponsable_id');
    } // enterpriseResponsables()

}

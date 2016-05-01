<?php

namespace App;

use App\JobOffer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{

    use SoftDeletes;
    
    // Relaciones many to many
    public function jobOffers()
    {
        return $this->belongsToMany(JobOffer::class, 'offerTags')->withPivot('jobOffer_id');
    } // jobOffers()
}

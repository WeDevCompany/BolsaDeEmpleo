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
    
    protected $fillable = [
       'road', 'address', 'name', 'email', 'phone1', 'phone2',
       'fax', 'enterprise_id', 'citie_id', 'principalCenter',
    ];

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

    // Funcion para buscar un profesor por nombre
    public function scopeName($query, $name)
    {
        if(trim($name) != ""){
            $query->where('name',"LIKE", "%$name%");
        }
    } // scopeName()
}

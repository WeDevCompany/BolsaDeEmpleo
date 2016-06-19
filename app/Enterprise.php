<?php

namespace App;

use App\User;
use App\WorkCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{

	use SoftDeletes;

	protected $fillable = [
       'name', 'cif', 'web', 'description', 'user_id',
    ];

    // Relaciones one to many
    public function workCenters()
    {
        return $this->hasMany(WorkCenter::class);
    } // workCenters()

    public function user()
    {
    	return $this->belongsTo(User::class);
    } // user()

    // Funcion para filtar por varios campos
    public function scopeFilter($query, $filter, $name)
    {
        if(isset($filter) && trim($filter) != ""){

            if($filter == 'workCenter') {
                $query->where('workCenters.name',"LIKE", "%$name%");
            } else if($filter == 'cif') {
                $query->where('cif',"LIKE", "%$name%");
            } else if ($filter == 'enterprise') {
                $query->where('enterprises.name',"LIKE", "%$name%");
            }
        }
    } // scopeFilter()

}

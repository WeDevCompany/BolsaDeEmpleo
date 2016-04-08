<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $fillable = [
       'firstName', 'lastName', 'dni', 'phone', 'user_id',
    ];
    
}

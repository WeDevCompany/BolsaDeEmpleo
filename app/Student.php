<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [
       'firstName', 'lastName', 'dni', 'nre', 'phone', 'road',
       'address', /*'curriculum',*/ 'birthdate', 'user_id',
    ];

}

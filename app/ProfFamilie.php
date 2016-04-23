<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfFamilie extends Model
{
	use SoftDeletes;

	public $table = 'profFamilies';

}

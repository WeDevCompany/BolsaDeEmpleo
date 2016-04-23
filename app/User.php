<?php

namespace App;

use App\Student;
use App\Teacher;
use App\Enterprise;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'rol', 'image', 'carpeta', 'code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Si se edita la contraseña se cifra
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    } // students()

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    } // teachers()

    public function enterprises()
    {
        return $this->belongsToMany(Enterprise::class);
    } // enterprises()
}

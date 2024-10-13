<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Graduation extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'graduations';

    protected $fillable = [
        'email', 'password', 'name', 'address', 'phone', 'facebook', 'google', 'linkedin', 'resume' , 'field_id'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    // Many-to-Many relationship with Job
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_applications');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

}

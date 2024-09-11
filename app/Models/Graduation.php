<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduation extends Model
{
    use HasFactory;

    protected $table = 'graduations';

    protected $fillable = [
        'email', 'password', 'name', 'faculty_id', 'section', 
        'grade', 'address', 'facebook', 'google', 'linkedin', 'resume'
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
}

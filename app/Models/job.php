<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_id', 'field_id', 'name', 'location', 'number', 'announcement_date', 
        'years_of_experience', 'required_qualification', 
        'type', 'required_gender', 'salary', 'computer_type' , 'description'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    // Many-to-Many relationship with Graduation
    public function graduations()
    {
        return $this->belongsToMany(Graduation::class, 'job_applications');
    }

    // Optionally, you can define the inverse of the hasMany relationship to JobApplication
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'field_id', 'username', 'name', 'state', 
        'city', 'address', 'commercial_index', 'tax_card', 'logo'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'graduation_id', // Foreign key to relate to graduation
        'name',
        'degree',
    ];

    // Define the relationship with Graduation
    public function graduation()
    {
        return $this->belongsTo(Graduation::class);
    }
}

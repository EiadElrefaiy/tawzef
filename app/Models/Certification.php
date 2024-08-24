<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $table = 'certifications';
    protected $fillable = ['graduation_id', 'education_id'];

    public function graduation()
    {
        return $this->belongsTo(Graduation::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

}

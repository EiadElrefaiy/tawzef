<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = ['graduation_id','faculty_id', 'degree_id', 'grade', 'from', 'to'];

    public function graduation()
    {
        return $this->belongsTo(Graduation::class, 'graduation_id');
    }
    
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
    
    public function degree()
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }
}

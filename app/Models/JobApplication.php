<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    protected $fillable = ['graduation_id', 'job_id'];

    public function graduation()
    {
        return $this->belongsTo(Graduation::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

}

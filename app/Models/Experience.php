<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experiences';

    protected $fillable = [
        'graduation_id', 'company', 'job', 'from', 'to'
    ];

    public function graduation()
    {
        return $this->belongsTo(Graduation::class);
    }

    
}

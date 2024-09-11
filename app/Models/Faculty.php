<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';

    protected $fillable = ['name'];

    public function graduations()
    {
        return $this->belongsTo(Graduation::class);
    }

    public function educations()
    {
        return $this->belongsTo(Education::class);
    }

}

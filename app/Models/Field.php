<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $table = 'fields';

    protected $fillable = ['name'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function graduations()
    {
        return $this->hasMany(Graduation::class);
    }

}

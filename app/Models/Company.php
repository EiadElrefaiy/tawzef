<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'username', 'name', 'state', 'city', 'address', 
        'commercial_index', 'tax_card', 'logo'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}

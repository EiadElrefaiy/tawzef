<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'companies';

    protected $fillable = [
        'email', 'name', 'state', 'city', 'address', 
        'commercial_index', 'tax_card', 'image'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function saudiaExp()
    {
        return $this->hasMany(ExperienceInSaudia::class);
    }

    public function gExp()
    {
        return $this->hasMany(Experience::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualifications::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}

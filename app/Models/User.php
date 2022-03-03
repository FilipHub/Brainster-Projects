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

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'biography',
        'image',
        'academy_id',
        'registration_step',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
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

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'users_skills');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function applications()
    {
        return $this->belongsToMany(Project::class, 'projects_users');
    }
    public function profile()
    {
        return $this->belongsTo(User::class, 'image');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;



    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requirements()
    {
        return $this->belongsToMany(Academy::class, 'academies_projects');
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'projects_users');
    }
}

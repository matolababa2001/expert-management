<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $fillable = [
        'name', 'email', 'location', 'certificate', 'photo'
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    
}
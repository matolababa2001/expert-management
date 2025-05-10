<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email']; // Add other fields as needed

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}

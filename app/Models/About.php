<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'name',
        'headline',
        'bio',
        'profile_image',
        'resume_url',
    ];

    public function getProfileImageUrlAttribute(): string
    {
        return $this->profile_image
            ? asset('storage/' . $this->profile_image)
            : asset('images/default-avatar.svg');
    }
}

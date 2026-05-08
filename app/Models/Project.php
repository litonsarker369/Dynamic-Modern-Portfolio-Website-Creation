<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'image_path',
        'project_url',
        'date',
        'featured',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image_path
            ? asset('storage/' . $this->image_path)
            : asset('images/placeholder.svg');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'icon_class',
        'category',
        'percentage',
        'display_order',
    ];

    protected function casts(): array
    {
        return [
            'percentage' => 'integer',
            'display_order' => 'integer',
        ];
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}

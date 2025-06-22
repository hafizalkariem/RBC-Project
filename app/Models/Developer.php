<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'description',
        'photo_url',
        'years_experience',
        'projects_completed',
        'success_rate',
        'github_url',
        'linkedin_url',
        'portfolio_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function skills()
    {
        return $this->hasMany(DeveloperSkill::class)->with('technology')->orderBy('order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(BlogArticle::class);
    }

    public function publishedArticles(): HasMany
    {
        return $this->hasMany(BlogArticle::class)->where('is_published', true);
    }
}
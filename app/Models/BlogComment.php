<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_article_id',
        'name',
        'email',
        'comment',
        'is_approved',
        'parent_id'
    ];

    protected $casts = [
        'is_approved' => 'boolean'
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(BlogArticle::class, 'blog_article_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(BlogComment::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(BlogComment::class, 'parent_id');
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('is_approved', true);
    }

    public function scopeParentComments(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }
}
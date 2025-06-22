<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $table = 'technologies';
    protected $fillable = [
        'tech_category_id',
        'name',
        'description',
        'logo_url',
        'expertise_level',
        'order',
    ];

    public function category()
    {
        return $this->belongsTo(TechCategory::class, 'tech_category_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function developerSkills()
    {
        return $this->hasMany(DeveloperSkill::class);
    }
}

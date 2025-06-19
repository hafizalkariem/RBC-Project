<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechCategory extends Model
{
    use HasFactory;
    protected $table = 'tech_categories';
    protected $fillable = [
        'name',
        'icon',
        'order',
    ];

    public function technologies()
    {
        return $this->hasMany(Technology::class);
    }
}

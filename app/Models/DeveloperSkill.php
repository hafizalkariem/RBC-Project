<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'technology_id',
        'proficiency_level',
        'order',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }
}
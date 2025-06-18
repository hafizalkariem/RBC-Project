<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
    ];

    // Define any relationships here, for example:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
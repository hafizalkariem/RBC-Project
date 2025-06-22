<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'original_price',
        'image_url',
        'category_id',
        'developer_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}

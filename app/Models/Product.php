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
        'source_code_path',
        'preview_url',
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

    public function getImageUrlAttribute($value)
    {
        // Jika sudah berupa URL lengkap, return as is
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }
        
        // Jika path lokal, convert ke asset URL
        if ($value && !empty($value)) {
            return asset('storage/' . $value);
        }
        
        // Default placeholder berdasarkan kategori
        $placeholders = [
            1 => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="250" viewBox="0 0 400 250"><rect width="400" height="250" fill="#6366f1"/><text x="200" y="125" text-anchor="middle" dy=".3em" fill="white" font-family="Arial" font-size="16">Dashboard Admin</text></svg>'),
            2 => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="250" viewBox="0 0 400 250"><rect width="400" height="250" fill="#10b981"/><text x="200" y="125" text-anchor="middle" dy=".3em" fill="white" font-family="Arial" font-size="16">Website UMKM</text></svg>'),
            3 => 'data:image/svg+xml;base64=' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="250" viewBox="0 0 400 250"><rect width="400" height="250" fill="#f59e0b"/><text x="200" y="125" text-anchor="middle" dy=".3em" fill="white" font-family="Arial" font-size="16">Portfolio</text></svg>'),
            4 => 'data:image/svg+xml;base64=' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="250" viewBox="0 0 400 250"><rect width="400" height="250" fill="#ef4444"/><text x="200" y="125" text-anchor="middle" dy=".3em" fill="white" font-family="Arial" font-size="16">E-Commerce</text></svg>'),
            5 => 'data:image/svg+xml;base64=' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="250" viewBox="0 0 400 250"><rect width="400" height="250" fill="#8b5cf6"/><text x="200" y="125" text-anchor="middle" dy=".3em" fill="white" font-family="Arial" font-size="16">Landing Page</text></svg>')
        ];
        
        return $placeholders[$this->category_id] ?? 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="250" viewBox="0 0 400 250"><rect width="400" height="250" fill="#6b7280"/><text x="200" y="125" text-anchor="middle" dy=".3em" fill="white" font-family="Arial" font-size="16">Source Code</text></svg>');
    }

    public function getSourceCodeUrlAttribute()
    {
        return $this->source_code_path ? asset('storage/' . $this->source_code_path) : null;
    }

    public function hasSourceCode()
    {
        return !empty($this->source_code_path) && \Storage::disk('public')->exists($this->source_code_path);
    }

    public function getSourceCodeSizeAttribute()
    {
        if (!$this->hasSourceCode()) {
            return null;
        }
        
        $bytes = \Storage::disk('public')->size($this->source_code_path);
        return $this->formatBytes($bytes);
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        
        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }
}

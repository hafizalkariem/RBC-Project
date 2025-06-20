<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechCategory;
use App\Models\Service;

class PageController extends Controller
{
    public function home()
    {
        $techCategories = TechCategory::with(['technologies' => function ($q) {
            $q->orderBy('order');
        }])->orderBy('order')->get();
        $services = Service::with(['features'])->orderBy('order')->get();
        return view('pages.home', compact('techCategories', 'services'));
    }

    public function toko()
    {
        return view('pages.toko');
    }
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function service()
    {
        return view('pages.service');
    }
    public function technology()
    {
        return view('pages.technology');
    }
    public function blog()
    {
        $services = Service::with(['features'])->orderBy('order')->get();
        return view('pages.blog', compact('services'));
    }
    
    public function blogDetail($slug = null)
    {
        // Sample blog data - in real app, fetch from database
        $article = [
            'id' => 1,
            'title' => 'Panduan Lengkap Laravel 10: Fitur Terbaru dan Best Practices',
            'slug' => 'panduan-lengkap-laravel-10',
            'category' => 'Web Development',
            'author' => 'Admin RBC',
            'date' => '15 Januari 2024',
            'read_time' => '8 min read',
            'image' => 'https://via.placeholder.com/1920x800/1e293b/3b82f6?text=Laravel+10+Guide',
            'excerpt' => 'Pelajari fitur-fitur terbaru Laravel 10 dan bagaimana mengimplementasikan best practices dalam pengembangan aplikasi web modern...',
            'tags' => ['Laravel', 'PHP', 'Web Development', 'Framework', 'Best Practices']
        ];
        
        // Sample related articles
        $relatedArticles = [
            [
                'title' => 'PHP 8.2: Fitur Baru yang Wajib Diketahui',
                'image' => 'https://via.placeholder.com/300x200/1e293b/8b5cf6?text=PHP+8.2',
                'date' => '10 Jan 2024',
                'excerpt' => 'Eksplorasi fitur-fitur terbaru PHP 8.2 yang akan meningkatkan performa aplikasi Anda...'
            ],
            [
                'title' => 'Optimasi Database MySQL untuk Laravel',
                'image' => 'https://via.placeholder.com/300x200/1e293b/10b981?text=Database+Optimization',
                'date' => '8 Jan 2024',
                'excerpt' => 'Tips dan trik untuk mengoptimalkan performa database MySQL dalam aplikasi Laravel...'
            ],
            [
                'title' => 'Membuat RESTful API dengan Laravel Sanctum',
                'image' => 'https://via.placeholder.com/300x200/1e293b/f59e0b?text=API+Development',
                'date' => '5 Jan 2024',
                'excerpt' => 'Panduan lengkap membuat API yang aman menggunakan Laravel Sanctum...'
            ]
        ];
        
        $services = Service::with(['features'])->orderBy('order')->get();
        
        return view('pages.blog-detail', compact('article', 'relatedArticles', 'services'));
    }
    
    public function portfolio()
    {
        return view('pages.portfolio');
    }
}

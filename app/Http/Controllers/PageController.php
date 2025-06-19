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

    public function services()
    {
        return view('pages.services');
    }
}

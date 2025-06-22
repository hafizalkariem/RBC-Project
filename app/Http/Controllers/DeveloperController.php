<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function show($id)
    {
        $developer = Developer::with(['skills.technology', 'products.technologies', 'products.category'])->findOrFail($id);
        
        return view('developer.profile', compact('developer'));
    }
}
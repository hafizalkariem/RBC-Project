<?php

namespace App\Http\Controllers;

use App\Models\BlogArticle;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = BlogArticle::with(['category', 'tags'])
            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $categories = BlogCategory::withCount('publishedArticles')
            ->where('is_active', true)
            ->get();

        $recentArticles = BlogArticle::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('pages.blog', compact('articles', 'categories', 'recentArticles'));
    }

    public function show($slug)
    {
        $article = BlogArticle::with(['category', 'tags', 'approvedComments'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        $article->incrementViews();

        $relatedArticles = BlogArticle::with('category')
            ->where('blog_category_id', $article->blog_category_id)
            ->where('id', '!=', $article->id)
            ->published()
            ->take(3)
            ->get();

        return view('pages.blog-detail', compact('article', 'relatedArticles'));
    }
}
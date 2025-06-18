<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::all();
        return view('pages.blog.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Blog::findOrFail($id);
        return view('pages.blog.show', compact('post'));
    }

    public function create()
    {
        return view('pages.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Blog::create($request->all());
        return redirect()->route('blog.index')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Blog::findOrFail($id);
        return view('pages.blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Blog::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('blog.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Blog::findOrFail($id);
        $post->delete();
        return redirect()->route('blog.index')->with('success', 'Post deleted successfully.');
    }
}
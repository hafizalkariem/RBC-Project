<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('pages.portfolio.index', compact('portfolios'));
    }

    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('pages.portfolio.show', compact('portfolio'));
    }

    public function create()
    {
        return view('pages.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;

        if ($request->hasFile('image')) {
            $portfolio->image = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio item created successfully.');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('pages.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;

        if ($request->hasFile('image')) {
            $portfolio->image = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio item deleted successfully.');
    }
}
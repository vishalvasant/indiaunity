<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::published()->with(['category', 'admin']);

        // Filter by category
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $blogs = $query->latest()->paginate(12);

        $categories = Category::active()
                            ->ordered()
                            ->withCount(['blogs' => function ($q) {
                                $q->published();
                            }])
                            ->get();

        return view('blogs.index', compact('blogs', 'categories'));
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog)
    {
        if (!$blog->isPublished()) {
            abort(404);
        }

        // Increment views
        $blog->incrementViews();

        // Get related blogs
        $relatedBlogs = Blog::published()
                          ->where('category_id', $blog->category_id)
                          ->where('id', '!=', $blog->id)
                          ->latest()
                          ->take(3)
                          ->get();

        return view('blogs.show', compact('blog', 'relatedBlogs'));
    }

    /**
     * Display blogs by category.
     */
    public function category(Category $category)
    {
        $blogs = Blog::published()
                   ->where('category_id', $category->id)
                   ->with(['admin'])
                   ->latest()
                   ->paginate(12);

        $categories = Category::active()
                            ->ordered()
                            ->withCount(['blogs' => function ($q) {
                                $q->published();
                            }])
                            ->get();

        return view('blogs.category', compact('blogs', 'category', 'categories'));
    }
}
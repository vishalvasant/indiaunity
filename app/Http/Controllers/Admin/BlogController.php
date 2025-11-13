<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::with(['category', 'admin']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                  ->orWhere('excerpt', 'like', "%{$request->search}%")
                  ->orWhere('content', 'like', "%{$request->search}%");
            });
        }

        // Sorting
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'views':
                $query->orderBy('views_count', 'desc');
                break;
            case 'title':
                $query->orderBy('title', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $blogs = $query->paginate(10);
        $categories = Category::active()->ordered()->get();

        // Get statistics
        $stats = [
            'total' => Blog::count(),
            'published' => Blog::where('status', 'published')->count(),
            'draft' => Blog::where('status', 'draft')->count(),
            'archived' => Blog::where('status', 'archived')->count(),
            'total_views' => Blog::sum('views_count'),
        ];

        return view('admin.blogs.index', compact('blogs', 'categories', 'stats'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created blog.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'tags' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $this->uploadImage($request->file('featured_image'));
        }

        $tags = $request->tags ? array_map('trim', explode(',', $request->tags)) : null;

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image' => $imagePath,
            'meta_title' => $request->meta_title ?: $request->title,
            'meta_description' => $request->meta_description ?: $request->excerpt,
            'tags' => $tags,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? 
                             ($request->published_at ?: now()) : null,
            'category_id' => $request->category_id,
            'admin_id' => auth('admin')->id(),
        ]);

        return redirect()->route('admin.blogs.index')
                        ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified blog.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'tags' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $blog->featured_image;
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($blog->featured_image && Storage::exists('public/' . $blog->featured_image)) {
                Storage::delete('public/' . $blog->featured_image);
            }
            $imagePath = $this->uploadImage($request->file('featured_image'));
        }

        $tags = $request->tags ? array_map('trim', explode(',', $request->tags)) : null;

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image' => $imagePath,
            'meta_title' => $request->meta_title ?: $request->title,
            'meta_description' => $request->meta_description ?: $request->excerpt,
            'tags' => $tags,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? 
                             ($request->published_at ?: now()) : null,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.blogs.index')
                        ->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified blog.
     */
    public function destroy(Blog $blog)
    {
        // Delete featured image
        if ($blog->featured_image && Storage::exists('public/' . $blog->featured_image)) {
            Storage::delete('public/' . $blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
                        ->with('success', 'Blog deleted successfully.');
    }

    /**
     * Toggle blog status.
     */
    public function toggleStatus(Blog $blog)
    {
        $newStatus = $blog->status === 'published' ? 'draft' : 'published';
        
        $blog->update([
            'status' => $newStatus,
            'published_at' => $newStatus === 'published' ? now() : null,
        ]);

        return response()->json([
            'success' => true,
            'status' => $newStatus,
            'message' => "Blog status changed to {$newStatus}."
        ]);
    }

    /**
     * Upload and process image.
     */
    private function uploadImage($file)
    {
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $path = 'blog-images/' . $filename;

        // Resize and optimize image
        $image = Image::make($file)
                     ->resize(800, 600, function ($constraint) {
                         $constraint->aspectRatio();
                         $constraint->upsize();
                     })
                     ->encode('jpg', 80);

        Storage::put('public/' . $path, $image);

        return $path;
    }
}
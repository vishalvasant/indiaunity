<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Inquiry;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'total_blogs' => Blog::count(),
            'published_blogs' => Blog::published()->count(),
            'draft_blogs' => Blog::draft()->count(),
            'total_categories' => Category::count(),
            'total_inquiries' => Inquiry::count(),
            'new_inquiries' => Inquiry::new()->count(),
            'unresolved_inquiries' => Inquiry::unresolved()->count(),
        ];

        $recentBlogs = Blog::with(['category', 'admin'])
                         ->latest()
                         ->take(5)
                         ->get();

        $recentInquiries = Inquiry::latest()
                                ->take(5)
                                ->get();

        $popularBlogs = Blog::published()
                          ->orderBy('views_count', 'desc')
                          ->take(5)
                          ->get();

        return view('admin.dashboard', compact('stats', 'recentBlogs', 'recentInquiries', 'popularBlogs'));
    }
}
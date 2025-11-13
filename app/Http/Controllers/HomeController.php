<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Inquiry;

class HomeController extends Controller
{
    /**
     * Show the landing page.
     */
    public function index()
    {
        $featuredBlogs = Blog::published()
                           ->latest()
                           ->take(6)
                           ->get();

        $categories = Category::active()
                            ->ordered()
                            ->withCount(['blogs' => function ($query) {
                                $query->published();
                            }])
                            ->get();

        return view('home', compact('featuredBlogs', 'categories'));
    }

    /**
     * Show the about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the FAQ page.
     */
    public function faq()
    {
        return view('faq');
    }

    /**
     * Store inquiry form submission.
     */
    public function storeInquiry(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'subject' => $request->subject,
            'message' => $request->message,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your inquiry! We will get back to you soon.'
        ]);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    /**
     * Display a listing of inquiries.
     */
    public function index(Request $request)
    {
        $query = Inquiry::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        // Filter by country
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Filter by date
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Search
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $inquiries = $query->with('respondedByAdmin')->latest()->paginate(15);
        
        // Get status counts
        $counts = [
            'all' => Inquiry::count(),
            'new' => Inquiry::byStatus('new')->count(),
            'in_progress' => Inquiry::byStatus('in_progress')->count(),
            'resolved' => Inquiry::byStatus('resolved')->count(),
            'closed' => Inquiry::byStatus('closed')->count(),
        ];

        // Get unique countries for filter dropdown
        $countries = Inquiry::whereNotNull('country')
                           ->distinct()
                           ->pluck('country')
                           ->sort()
                           ->values();

        $statuses = Inquiry::getStatuses();

        return view('admin.inquiries.index', compact('inquiries', 'statuses', 'counts', 'countries'));
    }

    /**
     * Display the specified inquiry.
     */
    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    /**
     * Update the specified inquiry.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,resolved,closed',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $inquiry->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->route('admin.inquiries.show', $inquiry)
                        ->with('success', 'Inquiry updated successfully.');
    }

    /**
     * Remove the specified inquiry.
     */
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')
                        ->with('success', 'Inquiry deleted successfully.');
    }

    /**
     * Respond to an inquiry.
     */
    public function respond(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'notes' => 'required|string|max:1000',
        ]);

        $inquiry->markAsResponded(auth('admin')->id(), $request->notes);

        return response()->json([
            'success' => true,
            'message' => 'Response recorded successfully.',
        ]);
    }
}
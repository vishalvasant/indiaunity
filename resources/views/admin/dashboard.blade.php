@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Dashboard</h2>
    <div class="text-muted">
        <i class="fas fa-calendar me-2"></i>{{ now()->format('F d, Y') }}
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stats-number">{{ $stats['total_blogs'] }}</div>
                        <div class="stats-label">Total Blogs</div>
                    </div>
                    <div class="text-primary">
                        <i class="fas fa-newspaper fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stats-number">{{ $stats['published_blogs'] }}</div>
                        <div class="stats-label">Published</div>
                    </div>
                    <div class="text-success">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stats-number">{{ $stats['total_inquiries'] }}</div>
                        <div class="stats-label">Total Inquiries</div>
                    </div>
                    <div class="text-info">
                        <i class="fas fa-envelope fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stats-number">{{ $stats['new_inquiries'] }}</div>
                        <div class="stats-label">New Inquiries</div>
                    </div>
                    <div class="text-warning">
                        <i class="fas fa-exclamation-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Blogs -->
    <div class="col-lg-8 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Blogs</h5>
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-2"></i>New Blog
                </a>
            </div>
            <div class="card-body p-0">
                @if($recentBlogs->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentBlogs as $blog)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.blogs.show', $blog) }}" class="text-decoration-none">
                                        {{ Str::limit($blog->title, 40) }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge" style="background-color: {{ $blog->category->color }};">
                                        {{ $blog->category->name }}
                                    </span>
                                </td>
                                <td>
                                    @if($blog->status === 'published')
                                    <span class="badge bg-success">Published</span>
                                    @elseif($blog->status === 'draft')
                                    <span class="badge bg-warning">Draft</span>
                                    @else
                                    <span class="badge bg-secondary">{{ ucfirst($blog->status) }}</span>
                                    @endif
                                </td>
                                <td>{{ $blog->views_count }}</td>
                                <td>{{ $blog->created_at->format('M d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center p-4">
                    <i class="fas fa-newspaper text-muted mb-3" style="font-size: 3rem;"></i>
                    <p class="text-muted">No blogs yet. <a href="{{ route('admin.blogs.create') }}">Create your first blog</a></p>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Recent Inquiries -->
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Inquiries</h5>
                <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-primary btn-sm">
                    View All
                </a>
            </div>
            <div class="card-body p-0">
                @if($recentInquiries->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($recentInquiries as $inquiry)
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ $inquiry->name }}</h6>
                                <p class="mb-1 text-muted small">{{ Str::limit($inquiry->subject, 30) }}</p>
                                <small class="text-muted">{{ $inquiry->created_at->diffForHumans() }}</small>
                            </div>
                            <span class="badge bg-{{ $inquiry->status_color }}">
                                {{ $inquiry->formatted_status }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center p-4">
                    <i class="fas fa-envelope text-muted mb-3" style="font-size: 2rem;"></i>
                    <p class="text-muted">No inquiries yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Popular Blogs -->
@if($popularBlogs->count() > 0)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Most Popular Blogs</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Views</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($popularBlogs as $blog)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.blogs.show', $blog) }}" class="text-decoration-none">
                                        {{ $blog->title }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge" style="background-color: {{ $blog->category->color }};">
                                        {{ $blog->category->name }}
                                    </span>
                                </td>
                                <td>
                                    <strong>{{ number_format($blog->views_count) }}</strong>
                                </td>
                                <td>{{ $blog->published_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('blogs.show', $blog) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
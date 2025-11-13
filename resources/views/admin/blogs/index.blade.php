@extends('admin.layouts.app')

@section('title', 'Blogs Management')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Blogs Management</h1>
            <p class="mb-0 text-muted">Create and manage blog posts</p>
        </div>
        <div>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Create New Blog
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Blogs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-blog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Published</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['published'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Drafts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['draft'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-edit fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Views</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_views'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <ul class="nav nav-tabs card-header-tabs" id="blogTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request('status') == '' ? 'active' : '' }}" 
                       href="{{ route('admin.blogs.index') }}">
                        <i class="fas fa-list me-2"></i>All Blogs
                        <span class="badge bg-secondary ms-2">{{ $stats['total'] ?? 0 }}</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request('status') == 'published' ? 'active' : '' }}" 
                       href="{{ route('admin.blogs.index', ['status' => 'published']) }}">
                        <i class="fas fa-check-circle me-2"></i>Published
                        <span class="badge bg-success ms-2">{{ $stats['published'] ?? 0 }}</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request('status') == 'draft' ? 'active' : '' }}" 
                       href="{{ route('admin.blogs.index', ['status' => 'draft']) }}">
                        <i class="fas fa-edit me-2"></i>Drafts
                        <span class="badge bg-warning ms-2">{{ $stats['draft'] ?? 0 }}</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request('status') == 'archived' ? 'active' : '' }}" 
                       href="{{ route('admin.blogs.index', ['status' => 'archived']) }}">
                        <i class="fas fa-archive me-2"></i>Archived
                        <span class="badge bg-dark ms-2">{{ $stats['archived'] ?? 0 }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.blogs.index') }}" class="row g-3">
                <input type="hidden" name="status" value="{{ request('status') }}">
                
                <div class="col-md-4">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="{{ request('search') }}" placeholder="Search by title, excerpt, or content...">
                </div>
                
                <div class="col-md-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="sort" class="form-label">Sort By</label>
                    <select class="form-select" id="sort" name="sort">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                        <option value="views" {{ request('sort') == 'views' ? 'selected' : '' }}>Most Viewed</option>
                        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title A-Z</option>
                    </select>
                </div>
                
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i>Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Blogs Table -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ request('status') ? ucfirst(request('status')) . ' ' : '' }}Blogs
            </h6>
        </div>
        <div class="card-body">
            @if($blogs->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="60">Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th width="120">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>
                                        @if($blog->featured_image)
                                            <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                                                 alt="{{ $blog->title }}" 
                                                 class="img-thumbnail" 
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ $blog->title }}</div>
                                        <small class="text-muted">{{ Str::limit($blog->excerpt, 60) }}</small>
                                        @if($blog->tags)
                                            <div class="mt-1">
                                                @foreach(json_decode($blog->tags) as $tag)
                                                    <span class="badge bg-light text-dark me-1">#{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge" style="background-color: {{ $blog->category->color }}">
                                            @if($blog->category->icon)
                                                <i class="{{ $blog->category->icon }} me-1"></i>
                                            @endif
                                            {{ $blog->category->name }}
                                        </span>
                                    </td>
                                    <td>
                                        @php
                                            $statusClasses = [
                                                'draft' => 'bg-warning',
                                                'published' => 'bg-success',
                                                'archived' => 'bg-dark'
                                            ];
                                        @endphp
                                        <span class="badge {{ $statusClasses[$blog->status] ?? 'bg-secondary' }}">
                                            {{ ucfirst($blog->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ number_format($blog->views_count) }}</span>
                                    </td>
                                    <td>
                                        <div>{{ $blog->admin->name }}</div>
                                        <small class="text-muted">{{ $blog->admin->email }}</small>
                                    </td>
                                    <td>
                                        @if($blog->status === 'published' && $blog->published_at)
                                            <div>{{ $blog->published_at->format('M j, Y') }}</div>
                                            <small class="text-muted">{{ $blog->published_at->format('g:i A') }}</small>
                                        @else
                                            <div>{{ $blog->created_at->format('M j, Y') }}</div>
                                            <small class="text-muted">{{ $blog->created_at->format('g:i A') }}</small>
                                        @endif
                                        @if($blog->read_time)
                                            <div><small class="text-muted">{{ $blog->read_time }} min read</small></div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.blogs.show', $blog) }}" 
                                               class="btn btn-sm btn-outline-info" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.blogs.edit', $blog) }}" 
                                               class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <!-- Quick Status Toggle -->
                                            @if($blog->status === 'draft')
                                                <form action="{{ route('admin.blogs.toggle-status', $blog) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-success" 
                                                            title="Publish">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                            @elseif($blog->status === 'published')
                                                <form action="{{ route('admin.blogs.toggle-status', $blog) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-warning" 
                                                            title="Unpublish">
                                                        <i class="fas fa-pause"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <form action="{{ route('admin.blogs.destroy', $blog) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this blog?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <p class="text-muted mb-0">
                            Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} 
                            of {{ $blogs->total() }} results
                        </p>
                    </div>
                    <div>
                        {{ $blogs->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-blog fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No blogs found</h5>
                    <p class="text-muted">
                        @if(request('search') || request('status') || request('category'))
                            No blogs match your current filters.
                        @else
                            No blogs have been created yet.
                        @endif
                    </p>
                    @if(request('search') || request('status') || request('category'))
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-times me-2"></i>Clear Filters
                        </a>
                    @else
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Create Your First Blog
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto-submit form on filter changes
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const categorySelect = document.getElementById('category');
        const sortSelect = document.getElementById('sort');
        
        // Auto-submit on select changes
        [categorySelect, sortSelect].forEach(element => {
            element.addEventListener('change', function() {
                this.closest('form').submit();
            });
        });
        
        // Submit search on Enter key
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.closest('form').submit();
            }
        });
    });
</script>
@endpush
@endsection
@extends('admin.layouts.app')

@section('title', 'Category: ' . $category->name)

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Category Details</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Categories
            </a>
            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i>Edit Category
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Category Information -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Information</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="category-display p-4 border rounded bg-light">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <div class="color-preview me-3" 
                                     style="width: 60px; height: 60px; background-color: {{ $category->color }}; border-radius: 50%; border: 3px solid #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1);"></div>
                                @if($category->icon)
                                    <i class="{{ $category->icon }} fa-3x text-muted"></i>
                                @endif
                            </div>
                            <h4 class="mb-2">{{ $category->name }}</h4>
                            <small class="text-muted">{{ $category->slug }}</small>
                            <div class="mt-2">
                                @if($category->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($category->description)
                        <div class="mb-3">
                            <h6 class="text-muted">Description</h6>
                            <p class="text-gray-800">{{ $category->description }}</p>
                        </div>
                    @endif

                    <hr>

                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border-end">
                                <h4 class="text-primary mb-1">{{ $blogs->total() }}</h4>
                                <small class="text-muted">Total Blogs</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <h4 class="text-info mb-1">{{ $category->sort_order }}</h4>
                            <small class="text-muted">Sort Order</small>
                        </div>
                    </div>

                    <hr>

                    <div class="small text-muted">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Created:</span>
                            <span>{{ $category->created_at->format('M j, Y g:i A') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Updated:</span>
                            <span>{{ $category->updated_at->format('M j, Y g:i A') }}</span>
                        </div>
                    </div>

                    <div class="mt-3 d-grid gap-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Edit Category
                        </a>
                        
                        @if($blogs->total() == 0)
                            <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()">
                                <i class="fas fa-trash me-2"></i>Delete Category
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Blogs -->
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Blogs in this Category ({{ $blogs->total() }})
                    </h6>
                    @if($blogs->total() > 0)
                        <a href="{{ route('admin.blogs.create') }}?category={{ $category->id }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-2"></i>Add New Blog
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    @if($blogs->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Published</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($blog->featured_image)
                                                        <img src="{{ Storage::url($blog->featured_image) }}" 
                                                             alt="{{ $blog->title }}" 
                                                             class="me-3 rounded"
                                                             style="width: 40px; height: 40px; object-fit: cover;">
                                                    @else
                                                        <div class="me-3 bg-light rounded d-flex align-items-center justify-content-center"
                                                             style="width: 40px; height: 40px;">
                                                            <i class="fas fa-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <div class="fw-bold">{{ Str::limit($blog->title, 40) }}</div>
                                                        @if($blog->is_featured)
                                                            <small class="badge bg-warning text-dark">Featured</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>{{ $blog->admin->name }}</div>
                                                <small class="text-muted">{{ $blog->admin->email }}</small>
                                            </td>
                                            <td>
                                                @php
                                                    $statusClasses = [
                                                        'published' => 'bg-success',
                                                        'draft' => 'bg-secondary',
                                                        'archived' => 'bg-warning text-dark'
                                                    ];
                                                @endphp
                                                <span class="badge {{ $statusClasses[$blog->status] ?? 'bg-secondary' }}">
                                                    {{ ucfirst($blog->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($blog->published_at)
                                                    <div>{{ $blog->published_at->format('M j, Y') }}</div>
                                                    <small class="text-muted">{{ $blog->published_at->format('g:i A') }}</small>
                                                @else
                                                    <span class="text-muted">Not published</span>
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
                                                    @if($blog->status === 'published')
                                                        <a href="{{ route('blogs.show', $blog) }}" 
                                                           target="_blank" class="btn btn-sm btn-outline-success" title="View Public">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($blogs->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $blogs->links() }}
                            </div>
                        @endif
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-blog fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No blogs in this category</h5>
                            <p class="text-muted">There are no blog posts assigned to this category yet.</p>
                            <a href="{{ route('admin.blogs.create') }}?category={{ $category->id }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Create First Blog
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if($blogs->total() == 0)
    <form id="deleteForm" action="{{ route('admin.categories.destroy', $category) }}" 
          method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endif

@push('scripts')
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this category? This action cannot be undone.')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endpush
@endsection
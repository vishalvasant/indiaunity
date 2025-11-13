@extends('admin.layouts.app')

@section('title', 'Blog Details')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
                    <li class="breadcrumb-item active">{{ $blog->title }}</li>
                </ol>
            </nav>
            <h1 class="h3 mb-0 text-gray-800">{{ $blog->title }}</h1>
        </div>
        <div>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i>Back to Blogs
            </a>
            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i>Edit Blog
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Blog Content -->
        <div class="col-lg-8">
            <!-- Featured Image -->
            @if($blog->featured_image)
                <div class="card shadow mb-4">
                    <div class="card-body p-0">
                        <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                             alt="{{ $blog->title }}" 
                             class="img-fluid w-100" 
                             style="max-height: 400px; object-fit: cover;">
                    </div>
                </div>
            @endif

            <!-- Blog Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Blog Content</h6>
                </div>
                <div class="card-body">
                    <!-- Excerpt -->
                    @if($blog->excerpt)
                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Excerpt</h6>
                            <p class="lead text-muted">{{ $blog->excerpt }}</p>
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="blog-content">
                        {!! $blog->content !!}
                    </div>

                    <!-- Tags -->
                    @if($blog->tags)
                        <div class="mt-4 pt-4 border-top">
                            <h6 class="text-muted mb-2">Tags</h6>
                            @foreach(json_decode($blog->tags) as $tag)
                                <span class="badge bg-light text-dark me-2 mb-2">#{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- SEO Information -->
            @if($blog->meta_title || $blog->meta_description)
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
                    </div>
                    <div class="card-body">
                        @if($blog->meta_title)
                            <div class="mb-3">
                                <strong>Meta Title:</strong> {{ $blog->meta_title }}
                            </div>
                        @endif
                        @if($blog->meta_description)
                            <div class="mb-3">
                                <strong>Meta Description:</strong> {{ $blog->meta_description }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Blog Information -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Blog Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Status:</strong>
                        @php
                            $statusClasses = [
                                'draft' => 'bg-warning',
                                'published' => 'bg-success',
                                'archived' => 'bg-dark'
                            ];
                        @endphp
                        <span class="badge {{ $statusClasses[$blog->status] ?? 'bg-secondary' }} ms-2">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <strong>Category:</strong>
                        <span class="badge ms-2" style="background-color: {{ $blog->category->color }}">
                            @if($blog->category->icon)
                                <i class="{{ $blog->category->icon }} me-1"></i>
                            @endif
                            {{ $blog->category->name }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <strong>Author:</strong> {{ $blog->admin->name }}
                    </div>

                    <div class="mb-3">
                        <strong>Created:</strong> {{ $blog->created_at->format('M j, Y \a\t g:i A') }}
                    </div>

                    @if($blog->published_at)
                        <div class="mb-3">
                            <strong>Published:</strong> {{ $blog->published_at->format('M j, Y \a\t g:i A') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <strong>Last Updated:</strong> {{ $blog->updated_at->format('M j, Y \a\t g:i A') }}
                    </div>

                    <div class="mb-3">
                        <strong>Views:</strong> 
                        <span class="badge bg-info">{{ number_format($blog->views_count) }}</span>
                    </div>

                    @if($blog->read_time)
                        <div class="mb-3">
                            <strong>Read Time:</strong> {{ $blog->read_time }} minutes
                        </div>
                    @endif

                    <div class="mb-3">
                        <strong>Slug:</strong> 
                        <code>{{ $blog->slug }}</code>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @if($blog->status === 'published')
                            <a href="{{ route('blogs.show', $blog->slug) }}" 
                               class="btn btn-outline-success" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i>View Live Blog
                            </a>
                        @endif

                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-outline-primary">
                            <i class="fas fa-edit me-2"></i>Edit Blog
                        </a>

                        <!-- Status Toggle -->
                        @if($blog->status === 'draft')
                            <form action="{{ route('admin.blogs.toggle-status', $blog) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-success w-100">
                                    <i class="fas fa-check me-2"></i>Publish Blog
                                </button>
                            </form>
                        @elseif($blog->status === 'published')
                            <form action="{{ route('admin.blogs.toggle-status', $blog) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-warning w-100">
                                    <i class="fas fa-pause me-2"></i>Unpublish Blog
                                </button>
                            </form>
                        @endif

                        <!-- Duplicate Blog -->
                        <form action="{{ route('admin.blogs.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="duplicate_from" value="{{ $blog->id }}">
                            <button type="submit" class="btn btn-outline-info w-100">
                                <i class="fas fa-copy me-2"></i>Duplicate Blog
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="card shadow border-danger">
                <div class="card-header py-3 bg-danger text-white">
                    <h6 class="m-0 font-weight-bold">Danger Zone</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">Once you delete this blog, there is no going back. Please be certain.</p>
                    
                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this blog? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Blog
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .blog-content {
        line-height: 1.8;
    }
    
    .blog-content h1,
    .blog-content h2,
    .blog-content h3,
    .blog-content h4,
    .blog-content h5,
    .blog-content h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .blog-content p {
        margin-bottom: 1rem;
    }
    
    .blog-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.375rem;
        margin: 1rem 0;
    }
    
    .blog-content blockquote {
        border-left: 4px solid #007bff;
        padding-left: 1rem;
        margin: 1.5rem 0;
        font-style: italic;
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 0.375rem;
    }
    
    .blog-content pre {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 0.375rem;
        overflow-x: auto;
    }
    
    .blog-content code {
        background-color: #f8f9fa;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-size: 0.875em;
    }
</style>
@endpush
@endsection
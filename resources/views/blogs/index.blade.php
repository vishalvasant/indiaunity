@extends('layouts.app')

@section('title', 'Blog - IndiaUnity')
@section('description', 'Stay updated with the latest insights, tips, and news about money transfers, fintech, and helping Indians abroad stay connected with home.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4" data-aos="fade-up">
                    IndiaUnity <span class="text-primary">Blog</span>
                </h1>
                <p class="lead text-muted mb-5" data-aos="fade-up" data-aos-delay="100">
                    Stay updated with the latest insights, tips, and news about money transfers and helping Indians abroad
                </p>
                
                <!-- Search and Filter -->
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-8 mx-auto">
                        <form method="GET" action="{{ route('blogs.index') }}" class="d-flex">
                            <input type="text" 
                                   class="form-control form-control-lg me-2" 
                                   placeholder="Search articles..." 
                                   name="search"
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories and Content -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-4 col-xl-3 mb-5">
                <div class="sticky-top" style="top: 100px;">
                    <!-- Categories -->
                    <div class="card mb-4" data-aos="fade-up">
                        <div class="card-header">
                            <h5 class="mb-0">Categories</h5>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('blogs.index') }}" 
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ !request('category') ? 'active' : '' }}">
                                All Articles
                                <span class="badge bg-primary rounded-pill">{{ $blogs->total() }}</span>
                            </a>
                            
                            @foreach($categories as $category)
                            <a href="{{ route('blogs.index', ['category' => $category->slug]) }}" 
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('category') == $category->slug ? 'active' : '' }}">
                                <span>
                                    @if($category->icon)
                                    <i class="{{ $category->icon }} me-2"></i>
                                    @endif
                                    {{ $category->name }}
                                </span>
                                <span class="badge bg-primary rounded-pill">{{ $category->blogs_count }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="card" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-body text-center">
                            <h5>Stay Updated</h5>
                            <p class="text-muted">Get the latest articles delivered to your inbox</p>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your email">
                            </div>
                            <button class="btn btn-primary w-100">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-8 col-xl-9">
                @if(request('search'))
                <div class="mb-4" data-aos="fade-up">
                    <h4>Search Results for "{{ request('search') }}"</h4>
                    <p class="text-muted">{{ $blogs->total() }} article(s) found</p>
                </div>
                @endif

                @if(request('category'))
                @php
                    $currentCategory = $categories->firstWhere('slug', request('category'));
                @endphp
                @if($currentCategory)
                <div class="mb-4" data-aos="fade-up">
                    <h4>{{ $currentCategory->name }}</h4>
                    <p class="text-muted">{{ $currentCategory->description }}</p>
                </div>
                @endif
                @endif

                @if($blogs->count() > 0)
                <div class="row">
                    @foreach($blogs as $index => $blog)
                    <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ ($index % 6 + 1) * 100 }}">
                        <div class="card blog-card h-100">
                            @if($blog->featured_image)
                            <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $blog->title }}">
                            @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-newspaper text-muted" style="font-size: 3rem;"></i>
                            </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge-category" style="background-color: {{ $blog->category->color }};">
                                        {{ $blog->category->name }}
                                    </span>
                                    <small class="text-muted ms-2">{{ $blog->formatted_published_date }}</small>
                                </div>
                                
                                <h5 class="card-title">
                                    <a href="{{ route('blogs.show', $blog) }}" class="text-decoration-none text-dark">
                                        {{ $blog->title }}
                                    </a>
                                </h5>
                                
                                <p class="card-text text-muted flex-grow-1">{{ $blog->excerpt }}</p>
                                
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-3">
                                            <i class="fas fa-clock me-1"></i>{{ $blog->read_time }} min read
                                        </small>
                                        <small class="text-muted">
                                            <i class="fas fa-eye me-1"></i>{{ $blog->views_count }} views
                                        </small>
                                    </div>
                                    <a href="{{ route('blogs.show', $blog) }}" class="btn btn-outline-primary btn-sm">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($blogs->hasPages())
                <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                    {{ $blogs->appends(request()->query())->links() }}
                </div>
                @endif

                @else
                <div class="text-center py-5" data-aos="fade-up">
                    <i class="fas fa-search text-muted mb-3" style="font-size: 4rem;"></i>
                    <h4>No Articles Found</h4>
                    <p class="text-muted">
                        @if(request('search'))
                        No articles match your search criteria. Try different keywords.
                        @else
                        No articles available in this category yet.
                        @endif
                    </p>
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary">
                        View All Articles
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
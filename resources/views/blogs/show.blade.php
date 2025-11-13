@extends('layouts.app')

@section('title', $blog->meta_title)
@section('description', $blog->meta_description)

@section('content')
<!-- Article Header -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" data-aos="fade-up">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blog</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blogs.category', $blog->category) }}">{{ $blog->category->name }}</a></li>
                        <li class="breadcrumb-item active">{{ $blog->title }}</li>
                    </ol>
                </nav>

                <!-- Article Meta -->
                <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                    <span class="badge-category" style="background-color: {{ $blog->category->color }};">
                        {{ $blog->category->name }}
                    </span>
                </div>

                <!-- Article Title -->
                <h1 class="display-5 fw-bold mb-4" data-aos="fade-up" data-aos-delay="200">
                    {{ $blog->title }}
                </h1>

                <!-- Article Meta Info -->
                <div class="d-flex align-items-center text-muted mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="me-4">
                        <i class="fas fa-user me-2"></i>{{ $blog->admin->name }}
                    </div>
                    <div class="me-4">
                        <i class="fas fa-calendar me-2"></i>{{ $blog->formatted_published_date }}
                    </div>
                    <div class="me-4">
                        <i class="fas fa-clock me-2"></i>{{ $blog->read_time }} min read
                    </div>
                    <div>
                        <i class="fas fa-eye me-2"></i>{{ $blog->views_count }} views
                    </div>
                </div>

                <!-- Article Excerpt -->
                @if($blog->excerpt)
                <p class="lead text-muted mb-5" data-aos="fade-up" data-aos-delay="400">
                    {{ $blog->excerpt }}
                </p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Featured Image -->
                @if($blog->featured_image)
                <div class="mb-5" data-aos="fade-up">
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                         alt="{{ $blog->title }}" 
                         class="img-fluid rounded shadow">
                </div>
                @endif

                <!-- Article Content -->
                <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                    {!! $blog->content !!}
                </div>

                <!-- Article Tags -->
                @if($blog->tags && count($blog->tags) > 0)
                <div class="mt-5 pt-5 border-top" data-aos="fade-up">
                    <h6 class="text-muted mb-3">Tags:</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($blog->tags as $tag)
                        <span class="badge bg-light text-dark border">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Share Buttons -->
                <div class="mt-5 pt-5 border-top" data-aos="fade-up">
                    <h6 class="text-muted mb-3">Share this article:</h6>
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                           target="_blank" 
                           class="btn btn-outline-primary">
                            <i class="fab fa-facebook-f me-2"></i>Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" 
                           target="_blank" 
                           class="btn btn-outline-info">
                            <i class="fab fa-twitter me-2"></i>Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" 
                           target="_blank" 
                           class="btn btn-outline-primary">
                            <i class="fab fa-linkedin-in me-2"></i>LinkedIn
                        </a>
                        <a href="whatsapp://send?text={{ urlencode($blog->title . ' - ' . request()->url()) }}" 
                           class="btn btn-outline-success">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Author Info -->
                <div class="mt-5 pt-5 border-top" data-aos="fade-up">
                    <div class="card bg-light border-0 p-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-user fa-lg"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">{{ $blog->admin->name }}</h6>
                                <p class="text-muted mb-0">
                                    Content author at IndiaUnity, passionate about helping Indians abroad stay connected with home.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Articles -->
@if($relatedBlogs->count() > 0)
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h3 class="text-center mb-5" data-aos="fade-up">Related Articles</h3>
                
                <div class="row">
                    @foreach($relatedBlogs as $index => $relatedBlog)
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="card blog-card h-100">
                            @if($relatedBlog->featured_image)
                            <img src="{{ asset('storage/' . $relatedBlog->featured_image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $relatedBlog->title }}">
                            @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-newspaper text-muted" style="font-size: 2rem;"></i>
                            </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge-category" style="background-color: {{ $relatedBlog->category->color }};">
                                        {{ $relatedBlog->category->name }}
                                    </span>
                                    <small class="text-muted ms-2">{{ $relatedBlog->formatted_published_date }}</small>
                                </div>
                                
                                <h6 class="card-title">
                                    <a href="{{ route('blogs.show', $relatedBlog) }}" class="text-decoration-none text-dark">
                                        {{ $relatedBlog->title }}
                                    </a>
                                </h6>
                                
                                <p class="card-text text-muted flex-grow-1 small">{{ Str::limit($relatedBlog->excerpt, 100) }}</p>
                                
                                <div class="mt-auto">
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>{{ $relatedBlog->read_time }} min read
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('blogs.index') }}" class="btn btn-outline-primary">
                        View All Articles <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="section bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h3 class="mb-3">Ready to Send Money Home?</h3>
                <p class="lead mb-0">
                    Start your transfer with IndiaUnity today and save with our 0.5% fees.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="#" class="btn btn-light btn-lg">
                    <i class="fas fa-paper-plane me-2"></i>Send Money Now
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.article-content {
    line-height: 1.8;
    font-size: 1.1rem;
}

.article-content h1,
.article-content h2,
.article-content h3,
.article-content h4,
.article-content h5,
.article-content h6 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: var(--dark-color);
}

.article-content p {
    margin-bottom: 1.5rem;
}

.article-content img {
    max-width: 100%;
    height: auto;
    border-radius: var(--border-radius);
    margin: 2rem 0;
}

.article-content blockquote {
    border-left: 4px solid var(--primary-color);
    padding-left: 1rem;
    margin: 2rem 0;
    font-style: italic;
    background-color: var(--light-color);
    padding: 1rem;
    border-radius: var(--border-radius);
}

.article-content ul,
.article-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.article-content li {
    margin-bottom: 0.5rem;
}

.article-content code {
    background-color: var(--light-color);
    padding: 0.2rem 0.4rem;
    border-radius: 0.25rem;
    font-size: 0.9em;
}

.article-content pre {
    background-color: var(--dark-color);
    color: var(--white);
    padding: 1rem;
    border-radius: var(--border-radius);
    overflow-x: auto;
    margin: 2rem 0;
}

.article-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 2rem 0;
}

.article-content th,
.article-content td {
    border: 1px solid #dee2e6;
    padding: 0.75rem;
    text-align: left;
}

.article-content th {
    background-color: var(--light-color);
    font-weight: 600;
}
</style>
@endpush
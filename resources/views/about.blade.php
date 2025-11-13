@extends('layouts.app')

@section('title', 'About IndiaUnity - Your Trusted Money Transfer Partner')
@section('description', 'Learn about IndiaUnity\'s mission to provide the fastest, most affordable money transfer service for Indians abroad. Built with trust, transparency, and innovation.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-4">
                    About <span class="text-primary">IndiaUnity</span>
                </h1>
                <p class="lead mb-4">
                    Connecting Indians worldwide with their families back home through fast, fair, and affordable money transfers.
                </p>
                <p class="text-muted">
                    We understand how important it is to stay connected to your loved ones — not just emotionally but financially.
                </p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="https://via.placeholder.com/500x400/007bff/ffffff?text=About+IndiaUnity" 
                     alt="About IndiaUnity" 
                     class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title" data-aos="fade-up">Our Mission</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    To make sending money from anywhere in the world to India faster, fairer, and more affordable than ever before.
                </p>
            </div>
        </div>
        
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4" data-aos="fade-right">
                <div class="card border-0 bg-light p-4">
                    <h3 class="h4 text-primary mb-3">Who We Are</h3>
                    <p class="text-muted">
                        IndiaUnity is a modern cross-border money transfer platform built for the global Indian community. 
                        We started our journey in <strong>Dubai</strong>, where millions of Indians work hard every day to support families back home.
                    </p>
                    <p class="text-muted mb-0">
                        Traditional remittance options often charge high fees or offer poor exchange rates — taking away a part of your hard-earned income. 
                        IndiaUnity changes that by introducing a <strong>transparent, technology-driven platform</strong> that puts you and your family first.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 mb-4" data-aos="fade-left">
                <img src="https://via.placeholder.com/500x350/f8f9fa/007bff?text=Mission+Image" 
                     alt="Our Mission" 
                     class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Our Promise Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title" data-aos="fade-up">Our Promise</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Every transfer with IndiaUnity comes with these guarantees
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 p-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div style="width: 60px; height: 60px; background: var(--gradient-primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                💸
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary">Lowest Fees in the Market — Just 0.5%</h5>
                            <p class="text-muted mb-0">
                                We believe every rupee counts. That's why we charge only 0.5% per transfer, with no hidden fees or extra margins.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 p-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div style="width: 60px; height: 60px; background: var(--gradient-primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                ⚡
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary">Fast & Reliable Transfers</h5>
                            <p class="text-muted mb-0">
                                With advanced fintech infrastructure and secure banking partnerships, your money reaches India within minutes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 p-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div style="width: 60px; height: 60px; background: var(--gradient-primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                🌎
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary">Expanding Globally</h5>
                            <p class="text-muted mb-0">
                                Starting from Dubai, we're building a network that will soon cover the UK, USA, Canada, and Australia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card h-100 p-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div style="width: 60px; height: 60px; background: var(--gradient-primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                🧡
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="text-primary">Trusted by Indians, Built for Families</h5>
                            <p class="text-muted mb-0">
                                Our name — IndiaUnity — reflects our purpose: to unite families, no matter the distance.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Values Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5" data-aos="fade-right">
                <h2 class="section-title">Our Vision</h2>
                <p class="text-muted lead">
                    To become the most <strong>trusted global remittance brand</strong> for Indians abroad — 
                    delivering speed, transparency, and the lowest cost for every transaction.
                </p>
                <img src="https://via.placeholder.com/500x300/f8f9fa/007bff?text=Vision+Image" 
                     alt="Our Vision" 
                     class="img-fluid rounded shadow">
            </div>
            
            <div class="col-lg-6 mb-5" data-aos="fade-left">
                <h2 class="section-title">Our Values</h2>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-shield-alt text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Trust</h6>
                                <p class="text-muted mb-0">Your money and data are protected with world-class security.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-eye text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Transparency</h6>
                                <p class="text-muted mb-0">No hidden charges, ever.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-heart text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Unity</h6>
                                <p class="text-muted mb-0">We connect families beyond borders.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-lightbulb text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Innovation</h6>
                                <p class="text-muted mb-0">Built on next-gen technology for seamless transfers.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Coming Soon Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title" data-aos="fade-up">Coming Soon</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Exciting features and expansion plans on the horizon
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h5>Real-time Rate Alerts</h5>
                    <p class="text-muted">Get notified when exchange rates hit your target level.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h5>Scheduled Transfers</h5>
                    <p class="text-muted">Set up recurring transfers for regular family support.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h5>Global Expansion</h5>
                    <p class="text-muted">Soon available in UK, USA, Canada, and Australia.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="h1 mb-3">Join the IndiaUnity Movement</h2>
                <p class="lead mb-0">
                    Be part of a community that's revolutionizing how Indians abroad stay connected with home.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="{{ route('home') }}#contact" class="btn btn-light btn-lg me-3">
                    <i class="fas fa-comments me-2"></i>Get in Touch
                </a>
                <a href="#" class="btn btn-outline-light btn-lg">
                    Start Transfer
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
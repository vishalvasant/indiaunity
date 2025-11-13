@extends('layouts.app')

@section('title', 'IndiaUnity - Innovative Fintech Solutions')
@section('description', 'IndiaUnity makes international money transfers simple, transparent, and lightning-fast. Send money from Dubai to India with the lowest fees in the market - just 0.5%.')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
<noscript><link href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&display=swap" rel="stylesheet"></noscript>
<style>
.hero-title, .section-title, .big-title {
    font-family: "Momo Trust Display", sans-serif !important;
    font-weight: 400;
    font-style: normal;
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 25%, #2563eb 50%, #1e40af 100%); min-height: 100vh;">
    <!-- Simplified Background Pattern without particles -->
    <div class="position-absolute w-100 h-100" style="background: radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.08) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.05) 0%, transparent 50%); z-index: 1;"></div>
    
    <div class="container position-relative" style="z-index: 10;">
        <div class="row d-flex" style="min-height: 100vh;">
            <!-- Left Content Column -->
            <div class="col-lg-6 col-xl-5 text-white" data-aos="fade-right" data-aos-duration="1000">
                <!-- Hero Badge -->
                <div class="mb-4" data-aos="fade-down" data-aos-delay="100">
                    <div class="d-inline-block px-4 py-2 rounded-pill" style="background: rgba(255, 193, 7, 0.15); border: 1px solid rgba(255, 193, 7, 0.3);">
                        <span class="text-warning me-2">
                            <i class="fas fa-star"></i>
                        </span>
                        <span class="text-warning fw-semibold">#1 Fintech Innovation Platform</span>
                    </div>
                </div>
                
                <!-- Main Headline -->
                <div class="mb-4">
                    <h1 class="display-3 fw-bold mb-3 text-white hero-title">
                        Revolutionizing 
                        <span class="text-warning">Financial Technology</span> 
                        for India
                    </h1>
                    <div class="bg-warning" style="height: 4px; width: 100px; border-radius: 2px;"></div>
                </div>
                
                <!-- Hero Description -->
                <div class="mb-4" data-aos="fade-up" data-aos-delay="300">
                    <p class="lead fs-5 text-white mb-0" style="opacity: 0.9; line-height: 1.6;">
                        Empowering businesses and individuals with cutting-edge fintech solutions. 
                        Experience the future of digital payments, lending, and financial services.
                    </p>
                </div>
                
                <!-- Hero Stats -->
                <div class="mb-5" data-aos="fade-up" data-aos-delay="400">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="text-center p-3 rounded-3" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                                <div class="d-flex justify-content-center align-items-baseline mb-2">
                                    <span class="h3 text-white mb-0 counter" data-target="500">10 </span>
                                    <span class="h5 text-warning mb-0">K+</span>
                                </div>
                                <div class="small text-white-50">Active Users</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center p-3 rounded-3" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                                <div class="d-flex justify-content-center align-items-baseline mb-2">
                                    <span class="h3 text-white mb-0 counter" data-target="99.9">97</span>
                                    <span class="h5 text-warning mb-0">%</span>
                                </div>
                                <div class="small text-white-50">Uptime</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center p-3 rounded-3" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                                <div class="d-flex justify-content-center align-items-baseline mb-2">
                                    <span class="h3 text-white mb-0 counter" data-target="24">24</span>
                                    <span class="h5 text-warning mb-0">/7</span>
                                </div>
                                <div class="small text-white-50">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Hero CTA Buttons -->
                <div class="mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="d-flex flex-wrap gap-3 align-items-center mb-4">
                        <a href="#services" class="btn btn-warning btn-lg px-4 py-3 fw-bold shadow">
                            <i class="fas fa-rocket me-2"></i>
                            Get Started
                        </a>
                        <a href="#about" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold">
                            <i class="fas fa-play-circle me-2"></i>
                            Learn More
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="d-flex gap-4 flex-wrap">
                        <div class="d-flex align-items-center text-white">
                            <i class="fas fa-lock text-success me-2"></i>
                            <span>Bank-level Security</span>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <i class="fas fa-certificate text-warning me-2"></i>
                            <span>RBI Approved</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Visual Column -->
            <div class="col-lg-6 col-xl-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="position-relative d-flex justify-content-end" style="margin-top:0;">
                    <!-- Redesigned Currency Converter -->
                    <div class="bg-white rounded-4 p-4 shadow-lg ms-lg-5 ms-md-4" data-aos="zoom-in" data-aos-delay="600" style="max-width: 420px; margin-top:0;">
                        <!-- Top Input Row -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="flex-grow-1 me-3">
                                <label class="small text-muted mb-1">Client pays</label>
                                <input type="number" id="clientPaysInput" class="form-control border-0 fw-bold" value="7000" min="1" style="font-size:2rem; background:#f8fafc;">
                            </div>
                            <div style="min-width:120px;">
                                <label class="small text-muted mb-1">Currency</label>
                                <div class="d-flex align-items-center bg-white border rounded-3 px-3 py-2" style="height:56px;">
                                    <span class="me-2" id="payFlag">🇺🇸</span>
                                    <select id="payCurrency" class="form-select border-0 p-0 fw-bold" style="background:transparent; font-size:1.1rem;">
                                        <option value="USD" selected>USD ▾</option>
                                        <option value="EUR">EUR ▾</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Range Slider -->
                        <div class="mb-1">
                            <input type="range" id="clientPaysRange" class="form-range" min="500" max="1000000" step="1" value="7000" style="accent-color:#1d4ed8;">
                        </div>
                        <div class="d-flex justify-content-between small text-muted mb-3 px-1">
                            <span>500</span><span>10K</span><span>100K</span><span>1M</span>
                        </div>
                        <!-- Live Rate Pill -->
                        <div class="text-center mb-3">
                            <div class="d-inline-flex flex-column align-items-center bg-light rounded-3 px-4 py-2" id="ratePill">
                                <div class="fw-semibold" id="fxRateDisplay">1 USD = 88.6154 INR <span class="text-success" id="rateTrend">▲</span></div>
                                <div class="small text-muted">Live FX rate • <span id="rateTimestamp">--:--</span></div>
                            </div>
                        </div>
                        <!-- Receive Card -->
                        <div class="border rounded-4 p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="small text-muted">You'll receive</div>
                                <div class="d-flex align-items-center gap-2">
                                    <span id="receiveFlag">🇮🇳</span>
                                    <select id="receiveCurrencySelect" class="form-select border-0 p-0 fw-bold" style="background:transparent; min-width:80px;">
                                        <option value="INR" selected>INR ▾</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 align-items-start">
                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span class="fw-bold text-primary">IndiaUnity</span>
                                        <span class="badge bg-primary bg-opacity-10 text-primary" style="font-size:.65rem;">BEST RATE</span>
                                    </div>
                                    <div class="display-6 fw-bold mb-3" style="font-size:2.2rem;" id="indiaUnityAmount">₹ 0</div>
                                </div>
                                <div class="col-6">
                                    <div class="small fw-semibold mb-1">Banks</div>
                                    <div class="fw-bold" id="banksAmount">₹ 0</div>
                                    <div class="text-danger small" id="banksLoss">You lose: 1.2% ▼</div>
                                </div>
                                <div class="col-6">
                                    <div class="small fw-semibold mb-1">Paypal</div>
                                    <div class="fw-bold" id="paypalAmount">₹ 0</div>
                                    <div class="text-danger small" id="paypalLoss">You lose: 8.7% ▼</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Feature Cards -->
                    <div class="d-none d-lg-block">
                        <!-- Security Badge -->
                        <!-- <div class="position-absolute bg-white rounded-3 p-3 shadow" style="top: -10%; right: -10%; width: 180px;" data-aos="fade-left" data-aos-delay="800">
                            <div class="text-center">
                                <div class="bg-success rounded-circle p-2 mx-auto mb-2" style="width: 48px; height: 48px;">
                                    <i class="fas fa-shield-check text-white"></i>
                                </div>
                                <div class="small fw-semibold text-dark">Bank-Level Security</div>
                                <div class="text-success small">✓ SSL Encrypted</div>
                                <div class="text-success small">✓ RBI Approved</div>
                            </div>
                        </div> -->
                        
                        <!-- Speed Indicator -->
                        <!-- <div class="position-absolute bg-white rounded-3 p-3 shadow" style="bottom: 0%; left: -15%; width: 180px;" data-aos="fade-right" data-aos-delay="1000">
                            <div class="text-center">
                                <div class="bg-primary rounded-circle p-2 mx-auto mb-2" style="width: 48px; height: 48px;">
                                    <i class="fas fa-bolt text-white"></i>
                                </div>
                                <div class="small fw-semibold text-dark">Lightning Fast</div>
                                <div class="text-primary small">⚡ 5 Minutes Transfer</div>
                                <div class="text-primary small">⚡ Instant Notifications</div>
                            </div>
                        </div> -->
                        
                        <!-- Live Rates -->
                        <!-- <div class="position-absolute bg-white rounded-3 p-3 shadow" style="top: 50%; right: -20%; width: 200px;" data-aos="fade-left" data-aos-delay="1200">
                            <div class="text-center">
                                <div class="bg-warning rounded-circle p-2 mx-auto mb-2" style="width: 48px; height: 48px;">
                                    <i class="fas fa-chart-line text-white"></i>
                                </div>
                                <div class="small fw-semibold text-dark">Live Exchange Rates</div>
                                <div class="text-warning small">📈 Real-time Updates</div>
                                <div class="text-warning small">📊 Best Market Rates</div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Simplified Scroll Indicator -->
    <div class="position-absolute text-center" style="bottom: 40px; left: 50%; transform: translateX(-50%); z-index: 10;" data-aos="fade-up" data-aos-delay="1500">
        <a href="#services" class="text-white text-decoration-none">
            <div class="d-flex flex-column align-items-center">
                <div class="border border-white rounded-pill d-flex align-items-center justify-content-center mb-2" style="width: 24px; height: 40px;">
                    <div class="bg-white rounded-pill" style="width: 3px; height: 8px; animation: scrollMove 2s ease-in-out infinite;"></div>
                </div>
                <small class="text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Explore Services</small>
                <i class="fas fa-chevron-down mt-1" style="animation: scrollBounce 2s ease-in-out infinite;"></i>
            </div>
        </a>
    </div>
</section>

<style>
@keyframes scrollMove {
    0%, 100% { transform: translateY(-8px); opacity: 1; }
    50% { transform: translateY(8px); opacity: 0.5; }
}

@keyframes scrollBounce {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(4px); }
}
</style>

<!-- Stats Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stats-counter" data-target="50000">0</div>
                <p class="text-muted">Happy Customers</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stats-counter">0.5<span class="text-primary">%</span></div>
                <p class="text-muted">Transfer Fee</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stats-counter" data-target="99.9">0</div>
                <p class="text-muted">Uptime %</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="stats-counter" data-target="5">0</div>
                <p class="text-muted">Minutes Transfer</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section py-5 position-relative" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
    <!-- Creative Background Elements -->
    <div class="position-absolute w-100 h-100" style="z-index: 1;">
        <div class="position-absolute" style="top: 10%; left: 5%; width: 60px; height: 60px; background: linear-gradient(45deg, #3b82f6, #1d4ed8); border-radius: 50%; opacity: 0.1; animation: float 6s ease-in-out infinite;"></div>
        <div class="position-absolute" style="top: 20%; right: 10%; width: 40px; height: 40px; background: linear-gradient(45deg, #f59e0b, #d97706); border-radius: 50%; opacity: 0.1; animation: float 8s ease-in-out infinite reverse;"></div>
        <div class="position-absolute" style="bottom: 30%; left: 15%; width: 80px; height: 80px; background: linear-gradient(45deg, #10b981, #059669); border-radius: 50%; opacity: 0.1; animation: float 7s ease-in-out infinite;"></div>
        <div class="position-absolute" style="bottom: 10%; right: 5%; width: 50px; height: 50px; background: linear-gradient(45deg, #8b5cf6, #7c3aed); border-radius: 50%; opacity: 0.1; animation: float 9s ease-in-out infinite reverse;"></div>
    </div>
    
    <div class="container position-relative" style="z-index: 10;">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <div class="section-badge mb-3" data-aos="fade-down">
                    <span class="badge px-4 py-2 rounded-pill" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; font-size: 14px;">
                        <i class="fas fa-rocket me-2"></i>Our Services
                    </span>
                </div>
                <h2 class="section-title mb-4 big-title" data-aos="fade-up" data-aos-delay="100" style="font-size: 3rem; font-weight: 700;">
                    Comprehensive <span style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Financial Solutions</span>
                </h2>
                <p class="lead text-muted" data-aos="fade-up" data-aos-delay="200">
                    Discover our suite of innovative fintech services designed to transform 
                    your financial experience and drive business growth.
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card h-100 position-relative overflow-hidden rounded-4 p-4" style="background: white; border: 1px solid rgba(59, 130, 246, 0.1); transition: all 0.3s ease;">
                    <div class="service-card-inner text-center">
                        <!-- Creative Icon Design -->
                        <div class="service-icon-wrapper mb-4 position-relative">
                            <span style=" font-size: 3rem;">💳</span>
                        </div>
                        <h4 class="service-title mb-3 big-title" style="color: #1e293b;">Digital Payments</h4>
                        <p class="service-description text-muted">
                            Seamless, secure, and instant payment solutions with multi-platform integration 
                            and real-time transaction monitoring.
                        </p>
                        <div class="service-features text-start mt-4">
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Instant Transfers</span>
                            </div>
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Multi-Currency Support</span>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Fraud Protection</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card h-100 position-relative overflow-hidden rounded-4 p-4" style="background: white; border: 1px solid rgba(59, 130, 246, 0.1); transition: all 0.3s ease;">
                    <div class="service-card-inner text-center">
                        <div class="service-icon-wrapper mb-4 position-relative">
                            <span style=" font-size: 3rem;">📊</span>
                        </div>
                        <h4 class="service-title mb-3 big-title" style="color: #1e293b;">Investment Analytics</h4>
                        <p class="service-description text-muted">
                            Advanced analytics and AI-powered insights to optimize your investment 
                            portfolio and maximize returns.
                        </p>
                        <div class="service-features text-start mt-4">
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>AI-Powered Analytics</span>
                            </div>
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Portfolio Optimization</span>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Risk Assessment</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card h-100 position-relative overflow-hidden rounded-4 p-4" style="background: white; border: 1px solid rgba(59, 130, 246, 0.1); transition: all 0.3s ease;">
                    <div class="service-card-inner text-center">
                        <div class="service-icon-wrapper mb-4 position-relative">
                            <span style=" font-size: 3rem;">💰</span>
                        </div>
                        <h4 class="service-title mb-3 big-title" style="color: #1e293b;">Smart Lending</h4>
                        <p class="service-description text-muted">
                            Quick, flexible lending solutions with instant approval and 
                            competitive interest rates for all your financial needs.
                        </p>
                        <div class="service-features text-start mt-4">
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Instant Approval</span>
                            </div>
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Flexible Terms</span>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Competitive Rates</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card h-100 position-relative overflow-hidden rounded-4 p-4" style="background: white; border: 1px solid rgba(59, 130, 246, 0.1); transition: all 0.3s ease;">
                    <div class="service-card-inner text-center">
                        <div class="service-icon-wrapper mb-4 position-relative">
                            <span style=" font-size: 3rem;">🔒</span>
                        </div>
                        <h4 class="service-title mb-3 big-title" style="color: #1e293b;">Blockchain Security</h4>
                        <p class="service-description text-muted">
                            Cutting-edge blockchain technology ensuring maximum security 
                            and transparency for all your financial transactions.
                        </p>
                        <div class="service-features text-start mt-4">
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Immutable Records</span>
                            </div>
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Smart Contracts</span>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Decentralized Security</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="service-card h-100 position-relative overflow-hidden rounded-4 p-4" style="background: white; border: 1px solid rgba(59, 130, 246, 0.1); transition: all 0.3s ease;">
                    <div class="service-card-inner text-center">
                        <div class="service-icon-wrapper mb-4 position-relative">
                            <span style=" font-size: 3rem;">🤖</span>
                        </div>
                        <h4 class="service-title mb-3 big-title" style="color: #1e293b;">AI Assistant</h4>
                        <p class="service-description text-muted">
                            24/7 AI-powered financial advisor providing personalized recommendations 
                            and automated financial planning.
                        </p>
                        <div class="service-features text-start mt-4">
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>24/7 Availability</span>
                            </div>
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Personalized Advice</span>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Automated Planning</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                <div class="service-card h-100 position-relative overflow-hidden rounded-4 p-4" style="background: white; border: 1px solid rgba(59, 130, 246, 0.1); transition: all 0.3s ease;">
                    <div class="service-card-inner text-center">
                        <div class="service-icon-wrapper mb-4 position-relative">
                            <span style=" font-size: 3rem;">🌍</span>
                        </div>
                        <h4 class="service-title mb-3 big-title" style="color: #1e293b;">Global Transfers</h4>
                        <p class="service-description text-muted">
                            International money transfers with competitive exchange rates 
                            and lightning-fast processing across 150+ countries.
                        </p>
                        <div class="service-features text-start mt-4">
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>150+ Countries</span>
                            </div>
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Real-time Rates</span>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Fast Processing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes pulse {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 0.6; }
}

@keyframes glow {
    0%, 100% { box-shadow: 0 20px 60px rgba(16,185,129,0.3); }
    50% { box-shadow: 0 25px 80px rgba(16,185,129,0.5), 0 0 50px rgba(16,185,129,0.3); }
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 40px rgba(16,185,129,0.5) !important;
}
</style>

<!-- Features Section -->
<section id="features" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title big-title" data-aos="fade-up">Why Thousands of Indians Choose IndiaUnity</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Experience the future of money transfers with unmatched speed, security, and savings
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h4 class="h5 mb-3">Only 0.5% Fees</h4>
                    <p class="text-muted">
                        The lowest fees in the market. Save more on every transfer compared to traditional banks and other services.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4 class="h5 mb-3">Instant Transfers</h4>
                    <p class="text-muted">
                        Money reaches India within minutes. Your family gets instant access to funds when they need it most.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h4 class="h5 mb-3">Full Transparency</h4>
                    <p class="text-muted">
                        No hidden charges, no markups on exchange rates. What you see is exactly what you pay.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card h-100 text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="h5 mb-3">Bank-Level Security</h4>
                    <p class="text-muted">
                        Your money and data are protected with world-class encryption and security measures.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                <div class="card h-100 text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h4 class="h5 mb-3">All Indian Banks</h4>
                    <p class="text-muted">
                        Send to any bank in India - SBI, HDFC, ICICI, Axis, Kotak, PNB, and 200+ more banks.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="600">
                <div class="card h-100 text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="h5 mb-3">24/7 Support</h4>
                    <p class="text-muted">
                        Round-the-clock customer support in English and Hindi for your peace of mind.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Creative Comparison Table -->
<section class="py-4 position-relative overflow-hidden" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
    <!-- Soft Background Accents (smaller for compact layout) -->
    <div class="position-absolute w-100 h-100" style="z-index: 1; opacity: 0.2;">
        <div class="position-absolute" style="top: 10%; left: 5%; width: 80px; height: 80px; background: radial-gradient(circle, rgba(59,130,246,0.25) 0%, transparent 70%); border-radius: 50%; animation: float 10s ease-in-out infinite;"></div>
        <div class="position-absolute" style="top: 60%; right: 8%; width: 100px; height: 100px; background: radial-gradient(circle, rgba(16,185,129,0.25) 0%, transparent 70%); border-radius: 50%; animation: float 12s ease-in-out infinite reverse;"></div>
        <div class="position-absolute" style="bottom: 15%; left: 15%; width: 80px; height: 80px; background: radial-gradient(circle, rgba(245,158,11,0.25) 0%, transparent 70%); border-radius: 50%; animation: float 8s ease-in-out infinite;"></div>
    </div>
    
    <!-- Subtle Mesh Overlay -->
    <div class="position-absolute w-100 h-100" style="z-index: 1; background: 
        radial-gradient(ellipse at 20% 30%, rgba(59,130,246,0.06) 0%, transparent 50%),
        radial-gradient(ellipse at 80% 70%, rgba(16,185,129,0.06) 0%, transparent 50%);"></div>
    
    <div class="container position-relative" style="z-index: 10;">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-4">
                <h2 class="big-title mb-2" data-aos="fade-up" data-aos-delay="100" style="font-size: 2.25rem; font-weight: 800; color: #0f172a; line-height: 1.2;">
                    See How Much You <span style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Save</span>
                </h2>
                <p class="mb-0" data-aos="fade-up" data-aos-delay="200" style="color: #475569; font-size: 1rem;">
                    Compare IndiaUnity with traditional banks and other money transfer services
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-10 mx-auto" data-aos="fade-up" data-aos-delay="200">
                <!-- Creative Comparison Cards -->
                <div class="row g-3 mb-4">
                    <!-- IndiaUnity Card (Highlighted) -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 position-relative overflow-hidden" style="background: linear-gradient(135deg, #1b82f6 0%, #f8fafc 100%); box-shadow: 0 10px 30px rgba(29,78,216,0.25);">
                            <!-- Glow Effect -->

                            
                            <div class="card-body text-center text-white p-4 pt-5 position-relative">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 56px; height: 56px; background: rgba(255,255,255,0.15); backdrop-filter: blur(8px);">
                                        <i class="fas fa-bolt fs-5 text-warning"></i>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <img src="{{ asset('images/logo.png') }}" alt="IndiaUnity Logo" class="navbar-logo" height="45">
                                </div>
                                <p class="small mb-3" style="color: rgba(255,255,255,0.9);">Smart, Fast & Transparent</p>
                                
                                <div class="comparison-features text-start">
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.18);">
                                        <span style="font-size: 0.9rem;"><i class="fas fa-tag me-2"></i>Transfer Fee</span>
                                        <strong class="text-success" style="font-size: 1rem;">0.5%</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.18);">
                                        <span style="font-size: 0.9rem;"><i class="fas fa-chart-line me-2"></i>Exchange Rate</span>
                                        <strong class="text-success" style="font-size: 1rem;">Mid-Market</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.18);">
                                        <span style="font-size: 0.9rem;"><i class="fas fa-clock me-2"></i>Transfer Time</span>
                                        <strong class="text-success" style="font-size: 1rem;">Instant</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.18);">
                                        <span style="font-size: 0.9rem;"><i class="fas fa-eye-slash me-2"></i>Hidden Fees</span>
                                        <strong class="text-success" style="font-size: 1rem;">Zero</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.18);">
                                        <span style="font-size: 0.9rem;"><i class="fas fa-shield-alt me-2"></i>Transparency</span>
                                        <strong class="text-success" style="font-size: 1rem;">100%</strong>
                                    </div>
                                </div>
                                
                                <div class="mt-4 pt-2">
                                    <button class="btn btn-lg fw-bold px-4 py-3 w-100" style="background: linear-gradient(135deg, #60a5fa, #2563eb); color: #fff; border: none; box-shadow: 0 8px 20px rgba(37,99,235,0.25); transition: all 0.3s ease;">
                                        <i class="fas fa-rocket me-2"></i>Start with IndiaUnity
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Traditional Banks Card -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm" style="background: #ffffff; border: 1px solid #e5e7eb;">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 64px; height: 64px; background: rgba(239,68,68,0.12);">
                                        <i class="fas fa-university fs-4" style="color: #ef4444;"></i>
                                    </div>
                                </div>
                                <h4 class="card-title mb-1" style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Traditional Banks</h4>
                                <p class="small mb-3" style="color: #64748b;">Outdated & Expensive</p>
                                
                                <div class="comparison-features text-start">
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-tag me-2"></i>Transfer Fee</span>
                                        <strong class="text-danger" style="font-size: 1rem;">3-5%</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-chart-line me-2"></i>Exchange Rate</span>
                                        <strong class="text-danger" style="font-size: 1rem;">Marked Up</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-clock me-2"></i>Transfer Time</span>
                                        <strong class="text-danger" style="font-size: 1rem;">2-5 Days</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-eye-slash me-2"></i>Hidden Fees</span>
                                        <strong class="text-danger" style="font-size: 1rem;">Yes</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-shield-alt me-2"></i>Transparency</span>
                                        <strong class="text-danger" style="font-size: 1rem;">Poor</strong>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <div class="badge bg-danger bg-opacity-10 text-danger px-3 py-1" style="border: 1px solid rgba(239,68,68,0.25);">
                                        <i class="fas fa-exclamation-triangle me-2"></i>Costly & Slow
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Other Apps Card -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm" style="background: #ffffff; border: 1px solid #e5e7eb;">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 64px; height: 64px; background: rgba(251,191,36,0.12);">
                                        <i class="fas fa-mobile-alt fs-4" style="color: #f59e0b;"></i>
                                    </div>
                                </div>
                                <h4 class="card-title mb-1" style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Other Apps</h4>
                                <p class="small mb-3" style="color: #64748b;">Better, But Not Best</p>
                                
                                <div class="comparison-features text-start">
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-tag me-2"></i>Transfer Fee</span>
                                        <strong class="text-warning" style="font-size: 1rem;">1-2%</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-chart-line me-2"></i>Exchange Rate</span>
                                        <strong class="text-warning" style="font-size: 1rem;">Below Mid</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-clock me-2"></i>Transfer Time</span>
                                        <strong class="text-warning" style="font-size: 1rem;">1-2 Days</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-eye-slash me-2"></i>Hidden Fees</span>
                                        <strong class="text-warning" style="font-size: 1rem;">Maybe</strong>
                                    </div>
                                    <div class="feature-row d-flex justify-content-between align-items-center mb-2 p-2 rounded" style="background: #f8fafc; border: 1px solid #e5e7eb;">
                                        <span style="font-size: 0.9rem; color: #334155;"><i class="fas fa-shield-alt me-2"></i>Transparency</span>
                                        <strong class="text-warning" style="font-size: 1rem;">Moderate</strong>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <div class="badge bg-warning bg-opacity-10 text-warning px-3 py-1" style="border: 1px solid rgba(251,191,36,0.25);">
                                        <i class="fas fa-minus-circle me-2"></i>Average Choice
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                
                <!-- CTA Section (compact) -->
                <div class="text-center mt-4">
                    <div class="d-flex gap-2 justify-content-center flex-wrap">
                        <a href="#" class="btn btn-sm px-4 py-2 fw-bold" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none;">
                            <i class="fas fa-rocket me-2"></i>Start Saving
                        </a>
                        <a href="#" class="btn btn-sm px-4 py-2 fw-bold" style="background: #ffffff; color: #1d4ed8; border: 1px solid #bfdbfe;">
                            <i class="fas fa-calculator me-2"></i>Estimate Savings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blogs Section -->
<!-- Offices Section -->
<section id="offices" class="section bg-white py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="section-title big-title" data-aos="fade-up" style="font-size:2.25rem;">Our Offices Around the World</h2>
                <p class="text-muted" data-aos="fade-up" data-aos-delay="100">Local teams in regions with large Indian communities — contact your nearest office.</p>
            </div>
        </div>

        <style>
        .office-card { transition: transform .25s ease, box-shadow .25s ease; }
        .office-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
        .office-flag { font-size: 2.25rem; width: 64px; height: 64px; display: inline-flex; align-items:center; justify-content:center; border-radius:12px; }
        .office-country { font-weight:700; font-size: 1rem; }
        .office-status { display: inline-block; padding: 2px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; }
        .status-active { background: #d1fae5; color: #065f46; }
        .status-coming { background: #fef3c7; color: #92400e; }
        </style>

        <div class="row g-3">
            <!-- UAE - Dubai Office (Active) -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="50">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇦🇪</div>
                        <div class="flex-grow-1">
                            <div class="office-country">UAE - Dubai</div>
                            <span class="office-status status-active">● Open</span>
                            <div class="mt-2 small">
                                <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+971501448327">+971 501 448 327</a><br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:indiaunityceo@gmail.com">indiaunityceo@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- India Office (Active) -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇮🇳</div>
                        <div class="flex-grow-1">
                            <div class="office-country">India</div>
                            <span class="office-status status-active">● Open</span>
                            <div class="mt-2 small">
                                <i class="fa fa-phone" aria-hidden="true"></i>️ <a href="tel:+918320241355">+91 832 024 1355</a><br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:indiaunityceo@gmail.com">indiaunityceo@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- United Kingdom -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇬🇧</div>
                        <div class="flex-grow-1">
                            <div class="office-country">United Kingdom</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                London Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- United States -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇺🇸</div>
                        <div class="flex-grow-1">
                            <div class="office-country">United States</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                New York Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Canada -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="250">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇨🇦</div>
                        <div class="flex-grow-1">
                            <div class="office-country">Canada</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                Toronto Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Australia -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇦🇺</div>
                        <div class="flex-grow-1">
                            <div class="office-country">Australia</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                Sydney Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Saudi Arabia -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="350">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇸🇦</div>
                        <div class="flex-grow-1">
                            <div class="office-country">Saudi Arabia</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                Riyadh Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Singapore -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇸🇬</div>
                        <div class="flex-grow-1">
                            <div class="office-country">Singapore</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                Singapore Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Malaysia -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="450">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇲🇾</div>
                        <div class="flex-grow-1">
                            <div class="office-country">Malaysia</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                Kuala Lumpur Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- South Africa -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="500">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇿🇦</div>
                        <div class="flex-grow-1">
                            <div class="office-country">South Africa</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                Johannesburg Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New Zealand -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="550">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇳🇿</div>
                        <div class="flex-grow-1">
                            <div class="office-country">New Zealand</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                Auckland Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Qatar -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="600">
                <div class="card office-card h-100 p-3 border-0 shadow-sm">
                    <div class="d-flex gap-2 align-items-start">
                        <div class="office-flag" style="">🇶🇦</div>
                        <div class="flex-grow-1">
                            <div class="office-country">Qatar</div>
                            <span class="office-status status-coming">Coming Soon</span>
                            <div class="mt-2 small text-muted">
                                Doha Office<br>
                                Opening 2026
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blogs Section -->
@if($featuredBlogs->count() > 0)
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title big-title" data-aos="fade-up">Latest from Our Blog</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Stay updated with the latest news, tips, and insights about money transfers and fintech
                </p>
            </div>
        </div>
        
        <div class="row">
            @foreach($featuredBlogs->take(3) as $index => $blog)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                <div class="card blog-card h-100">
                    @if($blog->featured_image)
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                         class="card-img-top" 
                         alt="{{ $blog->title }}">
                    @else
                    <div class="card-img-top d-flex align-items-center justify-content-center text-white" 
                         style="height: 200px; background: linear-gradient(135deg, #007bff, #0056b3);">
                        <div class="text-center">
                            <i class="fas fa-newspaper fs-1 mb-2"></i>
                            <div class="fw-bold">{{ $blog->title }}</div>
                        </div>
                    </div>
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <div class="mb-2">
                            <span class="badge-category">{{ $blog->category->name }}</span>
                            <small class="text-muted ms-2">{{ $blog->formatted_published_date }}</small>
                        </div>
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ $blog->excerpt }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>{{ $blog->read_time }} min read
                            </small>
                            <a href="{{ route('blogs.show', $blog) }}" class="btn btn-outline-primary btn-sm">
                                Read More
                            </a>
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
</section>
@endif

<!-- Testimonials Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title big-title" data-aos="fade-up">What Our Users Say</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Trusted by thousands of Indians in Dubai and across the UAE
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 p-4">
                    <div class="text-warning mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-muted">
                        "IndiaUnity saved me almost ₹2,000 every month compared to my old service. 
                        Fast, transparent, and truly made for us Indians in Dubai."
                    </p>
                    <div class="mt-auto">
                        <h6 class="mb-0">Rahul Mehta</h6>
                        <small class="text-muted">Dubai</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 p-4">
                    <div class="text-warning mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-muted">
                        "The 0.5% fee is a game changer. I now transfer money weekly without 
                        worrying about losing on exchange rates or hidden charges."
                    </p>
                    <div class="mt-auto">
                        <h6 class="mb-0">Sneha Patel</h6>
                        <small class="text-muted">Sharjah</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 p-4">
                    <div class="text-warning mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-muted">
                        "Finally, a service that understands our needs. My family in Mumbai 
                        receives money within minutes, every single time."
                    </p>
                    <div class="mt-auto">
                        <h6 class="mb-0">Arjun Singh</h6>
                        <small class="text-muted">Abu Dhabi</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Creative Contact Section -->
<section id="contact" class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%);">
    <!-- Creative Background -->
    <div class="position-absolute w-100 h-100" style="z-index: 1;">
        <!-- Floating geometric shapes -->
        <div class="position-absolute" style="top: 10%; left: 5%; width: 150px; height: 150px; background: linear-gradient(45deg, #3b82f6, #1d4ed8); opacity: 0.1; border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; animation: morphing 8s ease-in-out infinite;"></div>
        <div class="position-absolute" style="top: 20%; right: 10%; width: 100px; height: 100px; background: linear-gradient(45deg, #10b981, #059669); opacity: 0.1; border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%; animation: morphing 6s ease-in-out infinite reverse;"></div>
        <div class="position-absolute" style="bottom: 15%; left: 15%; width: 120px; height: 120px; background: linear-gradient(45deg, #f59e0b, #d97706); opacity: 0.1; border-radius: 50% 50% 80% 20% / 25% 75% 25% 75%; animation: morphing 10s ease-in-out infinite;"></div>
        <div class="position-absolute" style="bottom: 25%; right: 8%; width: 80px; height: 80px; background: linear-gradient(45deg, #8b5cf6, #7c3aed); opacity: 0.1; border-radius: 40% 60% 60% 40% / 60% 30% 70% 40%; animation: morphing 7s ease-in-out infinite reverse;"></div>
        
        <!-- Grid pattern overlay -->
        <div class="position-absolute w-100 h-100" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container position-relative" style="z-index: 10;">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <!-- Creative Header -->
                <div class="d-flex justify-content-center align-items-center gap-3 mb-4">
                    <div class="p-3 rounded-circle" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                        <i class="fas fa-comments text-white fs-3"></i>
                    </div>
                    <div class="p-3 rounded-circle" style="background: linear-gradient(135deg, #10b981, #059669);">
                        <i class="fas fa-envelope text-white fs-3"></i>
                    </div>
                    <div class="p-3 rounded-circle" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <i class="fas fa-phone text-white fs-3"></i>
                    </div>
                </div>
                
                <h2 class="big-title mb-4 text-white" data-aos="fade-up" style="font-size: 3.5rem; font-weight: 700;">
                    Get in <span style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Touch</span>
                </h2>
                <p class="lead text-white-50" data-aos="fade-up" data-aos-delay="100" style="font-size: 1.2rem;">
                    Have questions? We're here to help you every step of the way
                </p>
                
                <!-- Contact Stats -->
                <div class="row g-3 mt-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-4">
                        <div class="contact-stat text-center p-3 rounded-3" style="background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.2);">
                            <div class="h4 text-white mb-1">24/7</div>
                            <small class="text-white-50">Support Available</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-stat text-center p-3 rounded-3" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);">
                            <div class="h4 text-white mb-1">&lt; 5min</div>
                            <small class="text-white-50">Response Time</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-stat text-center p-3 rounded-3" style="background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.2);">
                            <div class="h4 text-white mb-1">98%</div>
                            <small class="text-white-50">Satisfaction Rate</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="300">
                <!-- Creative Contact Form -->
                <div class="contact-form-wrapper position-relative">
                    <div class="card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px);">
                        <div class="card-body p-5">
                            <!-- Form Header -->
                            <div class="text-center mb-4">
                                <div class="d-inline-block p-3 rounded-circle mb-3" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                                    <i class="fas fa-paper-plane text-white fs-4"></i>
                                </div>
                                <h4 class="big-title mb-2">Send us a Message</h4>
                                <p class="text-muted">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                            </div>
                            
                            <form id="inquiryForm">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Full Name" required style="border: 2px solid #e2e8f0; border-radius: 12px;">
                                            <label for="name"><i class="fas fa-user me-2 text-primary"></i>Full Name *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email Address" required style="border: 2px solid #e2e8f0; border-radius: 12px;">
                                            <label for="email"><i class="fas fa-envelope me-2 text-primary"></i>Email Address *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="Phone Number" style="border: 2px solid #e2e8f0; border-radius: 12px;">
                                            <label for="phone"><i class="fas fa-phone me-2 text-primary"></i>Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control form-control-lg" id="country" name="country" style="border: 2px solid #e2e8f0; border-radius: 12px;">
                                                <option value="">Select Country</option>
                                                <option value="UAE">🇦🇪 UAE</option>
                                                <option value="India">🇮🇳 India</option>
                                                <option value="Other">🌍 Other</option>
                                            </select>
                                            <label for="country"><i class="fas fa-globe me-2 text-primary"></i>Country</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-control-lg" id="subject" name="subject" placeholder="Subject" required style="border: 2px solid #e2e8f0; border-radius: 12px;">
                                            <label for="subject"><i class="fas fa-tag me-2 text-primary"></i>Subject *</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="message" name="message" placeholder="Your Message" required style="height: 120px; border: 2px solid #e2e8f0; border-radius: 12px;"></textarea>
                                            <label for="message"><i class="fas fa-comment me-2 text-primary"></i>Your Message *</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-lg px-5 py-3 fw-bold" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; border-radius: 50px;">
                                            <i class="fas fa-paper-plane me-2"></i>Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Info Cards -->
                <div class="row g-4 mt-5">
                    <div class="col-md-4">
                        <div class="card border-0 text-center h-100" style="background: rgba(59, 130, 246, 0.1); backdrop-filter: blur(10px);">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <i class="fas fa-map-marker-alt fs-2" style="color: #3b82f6;"></i>
                                </div>
                                <h5 class="text-white mb-2 big-title">Visit Us</h5>
                                <p class="text-white-50 small">Dubai Business Bay<br>United Arab Emirates</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center h-100" style="background: rgba(16, 185, 129, 0.1); backdrop-filter: blur(10px);">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <i class="fas fa-phone fs-2" style="color: #10b981;"></i>
                                </div>
                                <h5 class="text-white mb-2 big-title">Call Us</h5>
                                <p class="text-white-50 small">+971 4 123 4567<br>Available 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center h-100" style="background: rgba(245, 158, 11, 0.1); backdrop-filter: blur(10px);">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <i class="fas fa-envelope fs-2" style="color: #f59e0b;"></i>
                                </div>
                                <h5 class="text-white mb-2 big-title">Email Us</h5>
                                <p class="text-white-50 small">support@indiaunity.com<br>Quick response guaranteed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes morphing {
    0%, 100% { 
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; 
        transform: rotate(0deg) scale(1);
    }
    25% { 
        border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%; 
        transform: rotate(90deg) scale(1.1);
    }
    50% { 
        border-radius: 50% 50% 80% 20% / 25% 75% 25% 75%; 
        transform: rotate(180deg) scale(0.9);
    }
    75% { 
        border-radius: 40% 60% 60% 40% / 60% 30% 70% 40%; 
        transform: rotate(270deg) scale(1.05);
    }
}

.contact-form-wrapper .form-control:focus {
    border-color: #3b82f6 !important;
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25) !important;
}

.contact-stat {
    transition: all 0.3s ease;
}

.contact-stat:hover {
    transform: translateY(-5px);
    background: rgba(59, 130, 246, 0.2) !important;
}
</style>

<!-- CTA Section -->
<section class="section text-white" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="h1 mb-3 big-title">Ready to Join the IndiaUnity Movement?</h2>
                <p class="lead mb-0">
                    Start saving money on every transfer today. Your family deserves more.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="#" class="btn btn-outline-light btn-lg">
                    Send Money Now
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Currency converter configuration
let exchangeRates = {};
let isLoadingRates = false;

// Fee structure
const feeStructure = {
    transferFeePercent: 2.05,
    gstPercent: 18,
    bankTransferFee: 0
};

// Safe element getter
function getElement(id) {
    return document.getElementById(id);
}

// Format number
function formatNumber(num, decimals = 2) {
    return new Intl.NumberFormat('en-IN', {
        minimumFractionDigits: decimals,
        maximumFractionDigits: decimals
    }).format(num);
}

// Helper to set inner text with currency symbol
function formatCurrency(value, currency = 'INR') {
    const symbol = currency === 'INR' ? '₹' : (currency === 'USD' ? '$' : '');
    return `${symbol} ${formatNumber(value, 0)}`;
}

// Get exchange rate
function getExchangeRate(fromCurrency, toCurrency) {
    if (fromCurrency === toCurrency) return 1;
    
    if (exchangeRates[toCurrency]) {
        return exchangeRates[toCurrency];
    }
    
    const fallbackRates = {
        'EUR': { 'INR': 102.133, 'PKR': 308.45, 'BDT': 120.75, 'LKR': 365.20 },
        'USD': { 'INR': 84.50, 'PKR': 278.30, 'BDT': 107.20, 'LKR': 303.50 },
        'GBP': { 'INR': 105.75, 'PKR': 325.80, 'BDT': 134.20, 'LKR': 382.45 },
        'AED': { 'INR': 23.02, 'PKR': 75.85, 'BDT': 29.20, 'LKR': 82.65 },
        'SAR': { 'INR': 22.53, 'PKR': 74.25, 'BDT': 28.60, 'LKR': 80.95 }
    };
    
    return fallbackRates[fromCurrency]?.[toCurrency] || 1;
}

// Update display
function updateExchangeRateDisplay(fromCurrency, toCurrency) {
    const rate = getExchangeRate(fromCurrency, toCurrency);
    const pill = getElement('fxRateDisplay');
    if (pill) pill.textContent = `1 ${fromCurrency} = ${formatNumber(rate, 4)} ${toCurrency} `;
    const ts = getElement('rateTimestamp');
    if (ts) {
        const now = new Date();
        ts.textContent = `${String(now.getHours()).padStart(2,'0')}:${String(now.getMinutes()).padStart(2,'0')}`;
    }
}

// Calculate conversion
function calculateConversion() {
    const sendAmountElement = getElement('clientPaysInput') || getElement('sendAmount');
    const sendCurrencyElement = getElement('payCurrency') || getElement('sendCurrency');
    const receiveCurrencyElement = getElement('receiveCurrencySelect') || getElement('receiveCurrency');
    
    if (!sendAmountElement || !receiveAmountElement || !sendCurrencyElement || !receiveCurrencyElement) {
        return;
    }
    
    const sendAmount = parseFloat(sendAmountElement.value) || 0;
    if (sendAmount <= 0) return;
    
    const fromCurrency = sendCurrencyElement.value;
    const toCurrency = receiveCurrencyElement.value;
    const rate = getExchangeRate(fromCurrency, toCurrency);
    const convertedAmount = sendAmount * rate;
    // IndiaUnity fee set to 0.5%
    const iuFeePercent = 0.5;
    const iuFeeSend = (sendAmount * iuFeePercent) / 100;
    const iuFeeReceive = iuFeeSend * rate;
    const iuFinal = convertedAmount - iuFeeReceive;

    // Competitor assumptions based on screenshot
    const banksLossPercent = 1.2; // user loses this percent vs IU
    const paypalLossPercent = 8.7;
    const banksAmount = iuFinal * (1 - banksLossPercent / 100);
    const paypalAmount = iuFinal * (1 - paypalLossPercent / 100);

    const iuEl = getElement('indiaUnityAmount');
    if (iuEl) iuEl.textContent = formatCurrency(iuFinal, toCurrency);
    const bEl = getElement('banksAmount');
    if (bEl) bEl.textContent = formatCurrency(banksAmount, toCurrency);
    const pEl = getElement('paypalAmount');
    if (pEl) pEl.textContent = formatCurrency(paypalAmount, toCurrency);
    const rcvInput = getElement('receiveAmount');
    if (rcvInput) rcvInput.value = formatNumber(iuFinal, 2);
}

// Fetch rates with delay to not block initial page load
async function fetchLiveRates() {
    if (isLoadingRates) return;
    isLoadingRates = true;
    
    try {
    const sendCurrencyElement = getElement('payCurrency') || getElement('sendCurrency');
    const receiveCurrencyElement = getElement('receiveCurrencySelect') || getElement('receiveCurrency');
        
        if (!sendCurrencyElement || !receiveCurrencyElement) {
            return;
        }
        
        const fromCurrency = sendCurrencyElement.value;
        const toCurrency = receiveCurrencyElement.value;
        
        // Add small delay to not block initial page rendering
        await new Promise(resolve => setTimeout(resolve, 100));
        
        const response = await fetch(`https://api.exchangerate-api.com/v4/latest/${fromCurrency}`);
        const data = await response.json();
        
        if (data && data.rates) {
            exchangeRates = data.rates;
            updateExchangeRateDisplay(fromCurrency, toCurrency);
            calculateConversion();
        }
    } catch (error) {
        console.error('Rate fetch error:', error);
        // Use fallback rates immediately without API delay
        exchangeRates = { 'INR': 102.133, 'PKR': 308.45, 'BDT': 120.75, 'LKR': 365.20 };
    const sendCurrencyElement = getElement('payCurrency') || getElement('sendCurrency');
    const receiveCurrencyElement = getElement('receiveCurrencySelect') || getElement('receiveCurrency');
        if (sendCurrencyElement && receiveCurrencyElement) {
            updateExchangeRateDisplay(sendCurrencyElement.value, receiveCurrencyElement.value);
            calculateConversion();
        }
    } finally {
        isLoadingRates = false;
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    const sendAmountElement = getElement('clientPaysInput') || getElement('sendAmount');
    const range = getElement('clientPaysRange');
    const sendCurrencyElement = getElement('payCurrency') || getElement('sendCurrency');
    const receiveCurrencyElement = getElement('receiveCurrencySelect') || getElement('receiveCurrency');

    // Flag updater
    const currencyToFlag = { USD: '🇺🇸', EUR: '🇪🇺', INR: '🇮🇳' };
    const payFlag = getElement('payFlag');
    const receiveFlag = getElement('receiveFlag');
    function updateFlags() {
        if (payFlag && sendCurrencyElement) payFlag.textContent = currencyToFlag[sendCurrencyElement.value] || '🏳️';
        if (receiveFlag && receiveCurrencyElement) receiveFlag.textContent = currencyToFlag[receiveCurrencyElement.value] || '🏳️';
    }
    
    if (sendAmountElement) sendAmountElement.addEventListener('input', (e) => {
        if (range) range.value = e.target.value;
        calculateConversion();
    });
    if (range) range.addEventListener('input', (e) => {
        if (sendAmountElement) sendAmountElement.value = e.target.value;
        calculateConversion();
    });
    
    if (sendCurrencyElement) sendCurrencyElement.addEventListener('change', () => { updateFlags(); fetchLiveRates(); });
    
    if (receiveCurrencyElement) receiveCurrencyElement.addEventListener('change', () => { updateFlags(); fetchLiveRates(); });
    
    // Delay initial rate fetch to not block page load
    setTimeout(() => { updateFlags(); fetchLiveRates(); }, 500);
    
    // Update rates every 60 seconds (reduced frequency)
    setInterval(fetchLiveRates, 60000);
    
    // Counter animations
    const statsCounters = document.querySelectorAll('.stats-counter[data-target]');
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-target'));
                let current = 0;
                const increment = target / 100;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };
                
                updateCounter();
                observer.unobserve(counter);
            }
        });
    }, { threshold: 0.7 });
    
    statsCounters.forEach(counter => observer.observe(counter));
});
</script>
@endpush

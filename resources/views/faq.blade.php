@extends('layouts.app')

@section('title', 'FAQ - Frequently Asked Questions | IndiaUnity')
@section('description', 'Find answers to common questions about IndiaUnity\'s money transfer service. Learn about fees, transfer times, security, and supported banks.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4" data-aos="fade-up">
                    Frequently Asked <span class="text-primary">Questions</span>
                </h1>
                <p class="lead text-muted mb-5" data-aos="fade-up" data-aos-delay="100">
                    Get quick answers to the most common questions about IndiaUnity
                </p>
                
                <!-- Search FAQ -->
                <div class="position-relative mb-5" data-aos="fade-up" data-aos-delay="200">
                    <input type="text" 
                           class="form-control form-control-lg" 
                           placeholder="Search FAQ..." 
                           id="faqSearch">
                    <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- FAQ Item 1 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        <span>What is IndiaUnity?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq1">
                        <div class="faq-content">
                            <p>IndiaUnity is a secure online platform that helps you send money from <strong>Dubai to India</strong> instantly, with the <strong>lowest fee in the market — just 0.5%</strong>.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="150">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        <span>How much does it cost to send money to India?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq2">
                        <div class="faq-content">
                            <p>We charge a <strong>flat 0.5% transfer fee</strong>, regardless of the amount. There are <strong>no hidden charges, no markups on exchange rates</strong>, and no surprise deductions.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        <span>How long does a transfer take?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq3">
                        <div class="faq-content">
                            <p>Most transfers from Dubai to India are <strong>instant</strong> or completed <strong>within a few minutes</strong>, depending on the recipient's bank.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="250">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        <span>How do I start using IndiaUnity?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq4">
                        <div class="faq-content">
                            <ol class="text-muted">
                                <li>Sign up on our website or app</li>
                                <li>Verify your identity (Emirates ID or Passport)</li>
                                <li>Add your recipient's Indian bank details</li>
                                <li>Enter the amount and complete payment</li>
                            </ol>
                            <p>Your family receives INR directly in their account.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                        <span>Is IndiaUnity safe and legal?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq5">
                        <div class="faq-content">
                            <p><strong>Yes.</strong> IndiaUnity follows all <strong>UAE and Indian regulatory guidelines</strong>. All transactions are <strong>fully encrypted</strong>, and we partner only with <strong>licensed financial institutions</strong>.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="350">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                        <span>Which banks in India can receive money?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq6">
                        <div class="faq-content">
                            <p>We support <strong>all major Indian banks</strong>, including:</p>
                            <ul class="text-muted">
                                <li>State Bank of India (SBI)</li>
                                <li>HDFC Bank</li>
                                <li>ICICI Bank</li>
                                <li>Axis Bank</li>
                                <li>Kotak Mahindra Bank</li>
                                <li>Punjab National Bank (PNB)</li>
                                <li>And 200+ more banks</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 7 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                        <span>Can I track my transaction?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq7">
                        <div class="faq-content">
                            <p><strong>Yes</strong>, you can <strong>track every transfer in real time</strong> on your dashboard. You'll also receive instant SMS and email notifications when the money is received.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 8 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="450">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                        <span>What makes IndiaUnity different from other money transfer apps?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq8">
                        <div class="faq-content">
                            <ul class="text-muted">
                                <li>✅ Only <strong>0.5% fees</strong> — the lowest in the market</li>
                                <li>✅ <strong>Real exchange rates</strong> (no hidden markups)</li>
                                <li>✅ <strong>Instant transfers</strong> to any Indian bank</li>
                                <li>✅ <strong>24/7 support</strong> for peace of mind</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 9 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                        <span>Do you have a mobile app?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq9">
                        <div class="faq-content">
                            <p><strong>Yes</strong>, the <strong>IndiaUnity app</strong> (iOS and Android) will be launching soon — for easy transfers anytime, anywhere.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 10 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="550">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                        <span>Where are you based?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq10">
                        <div class="faq-content">
                            <p>Our head office is in <strong>Dubai, UAE</strong>, with expansion plans for <strong>the UK, USA, Canada, and Australia</strong> in upcoming phases.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 11 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq11">
                        <span>What documents do I need to verify my account?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq11">
                        <div class="faq-content">
                            <p>For UAE residents, you'll need:</p>
                            <ul class="text-muted">
                                <li>Emirates ID (front and back)</li>
                                <li>UAE Visa page</li>
                                <li>Salary certificate or employment letter</li>
                            </ul>
                            <p>For visitors, a valid passport is sufficient.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 12 -->
                <div class="faq-item" data-aos="fade-up" data-aos-delay="650">
                    <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq12">
                        <span>What are the transfer limits?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="collapse" id="faq12">
                        <div class="faq-content">
                            <p>Transfer limits depend on your verification level:</p>
                            <ul class="text-muted">
                                <li><strong>Basic verification:</strong> Up to AED 3,000 per transaction</li>
                                <li><strong>Full verification:</strong> Up to AED 50,000 per transaction</li>
                                <li><strong>Monthly limit:</strong> Up to AED 200,000</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Still Have Questions Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title" data-aos="fade-up">Still Have Questions?</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Our support team is here to help you 24/7
                </p>
                
                <div class="row mt-5">
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h5>Live Chat</h5>
                            <p class="text-muted mb-3">Get instant answers from our support team</p>
                            <a href="#" class="btn btn-outline-primary">Start Chat</a>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h5>Email Support</h5>
                            <p class="text-muted mb-3">Send us your questions anytime</p>
                            <a href="mailto:hello@indiaunity.com" class="btn btn-outline-primary">Send Email</a>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h5>Phone Support</h5>
                            <p class="text-muted mb-3">Call us for immediate assistance</p>
                            <a href="tel:+97141234567" class="btn btn-outline-primary">+971 4 123 4567</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card p-5">
                    <h3 class="text-center mb-4" data-aos="fade-up">Ask a Question</h3>
                    <form id="faqInquiryForm" data-aos="fade-up" data-aos-delay="100">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Your Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject *</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Question *</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Send Question
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// FAQ Search functionality
document.getElementById('faqSearch').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-button span').textContent.toLowerCase();
        const answer = item.querySelector('.faq-content').textContent.toLowerCase();
        
        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

// FAQ toggle icons
document.querySelectorAll('.faq-button').forEach(button => {
    button.addEventListener('click', function() {
        const icon = this.querySelector('i');
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        
        // Toggle icon
        setTimeout(() => {
            if (this.getAttribute('aria-expanded') === 'true') {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        }, 100);
    });
});

// FAQ form submission
document.getElementById('faqInquiryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    // Show loading state
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
    submitBtn.disabled = true;
    
    fetch('{{ route("inquiry.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success alert-dismissible fade show';
            alertDiv.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>${data.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            this.insertBefore(alertDiv, this.firstChild);
            
            // Reset form
            this.reset();
        } else {
            throw new Error(data.message || 'Something went wrong');
        }
    })
    .catch(error => {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger alert-dismissible fade show';
        alertDiv.innerHTML = `
            <i class="fas fa-exclamation-circle me-2"></i>Error: ${error.message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        this.insertBefore(alertDiv, this.firstChild);
    })
    .finally(() => {
        // Reset button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});
</script>
@endpush
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Inquiry;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = Admin::create([
            'name' => 'IndiaUnity Admin',
            'email' => 'admin@indiaunity.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Create categories
        $categories = [
            [
                'name' => 'Money Transfer Tips',
                'slug' => 'money-transfer-tips',
                'description' => 'Best practices and tips for international money transfers',
                'color' => '#007bff',
                'icon' => 'fas fa-money-bill-transfer',
                'sort_order' => 1,
            ],
            [
                'name' => 'Fintech News',
                'slug' => 'fintech-news',
                'description' => 'Latest news and updates in the fintech industry',
                'color' => '#28a745',
                'icon' => 'fas fa-newspaper',
                'sort_order' => 2,
            ],
            [
                'name' => 'Expat Life',
                'slug' => 'expat-life',
                'description' => 'Living abroad as an Indian expatriate',
                'color' => '#ff6b35',
                'icon' => 'fas fa-globe',
                'sort_order' => 3,
            ],
            [
                'name' => 'Regulatory Updates',
                'slug' => 'regulatory-updates',
                'description' => 'Updates on remittance regulations and compliance',
                'color' => '#6c757d',
                'icon' => 'fas fa-gavel',
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Create sample blogs
        $blogs = [
            [
                'title' => '5 Ways to Save Money on International Transfers',
                'slug' => '5-ways-to-save-money-on-international-transfers',
                'excerpt' => 'Discover practical tips to reduce costs when sending money to India from Dubai.',
                'content' => '<p>Sending money internationally can be expensive, but with the right strategies, you can save significantly on transfer fees and exchange rates.</p>

<h3>1. Compare Transfer Services</h3>
<p>Not all money transfer services are created equal. Traditional banks often charge high fees and offer poor exchange rates, while modern fintech companies like IndiaUnity offer competitive rates with transparent pricing.</p>

<h3>2. Understand the Real Cost</h3>
<p>Look beyond the advertised transfer fee. The real cost includes both the fee and the exchange rate margin. A service with a low fee but poor exchange rate might cost you more overall.</p>

<h3>3. Time Your Transfers</h3>
<p>Exchange rates fluctuate constantly. If you\'re not in a hurry, wait for favorable rates or use rate alert services to notify you when rates improve.</p>

<h3>4. Send Larger Amounts Less Frequently</h3>
<p>Instead of sending small amounts frequently, consider sending larger amounts less often to reduce the impact of fixed fees.</p>

<h3>5. Choose Digital Over Traditional</h3>
<p>Digital money transfer services typically offer better rates and lower fees compared to traditional banks and physical money transfer locations.</p>

<p>With IndiaUnity\'s 0.5% fee and transparent pricing, you can save hundreds of dollars annually compared to traditional banking services.</p>',
                'category_id' => 1,
                'admin_id' => $admin->id,
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'tags' => ['money transfer', 'savings', 'tips', 'dubai to india'],
            ],
            [
                'title' => 'Understanding UAE Remittance Regulations',
                'slug' => 'understanding-uae-remittance-regulations',
                'excerpt' => 'A comprehensive guide to money transfer regulations in the UAE and what you need to know.',
                'content' => '<p>The UAE has specific regulations governing international money transfers to ensure compliance with anti-money laundering (AML) and counter-terrorism financing (CTF) requirements.</p>

<h3>Key Regulatory Requirements</h3>
<p>All money service businesses in the UAE must be licensed by the Central Bank of the UAE and comply with strict reporting requirements.</p>

<h3>Know Your Customer (KYC)</h3>
<p>Money transfer services must verify the identity of their customers through proper documentation, including Emirates ID, passport, and visa.</p>

<h3>Transaction Limits</h3>
<p>The UAE has specific limits on how much money can be transferred without additional documentation. These limits vary based on your residency status and the purpose of the transfer.</p>

<h3>Compliance with Indian Regulations</h3>
<p>Transfers to India must also comply with Indian foreign exchange regulations, including the Foreign Exchange Management Act (FEMA).</p>

<p>IndiaUnity ensures full compliance with both UAE and Indian regulations, giving you peace of mind with every transfer.</p>',
                'category_id' => 4,
                'admin_id' => $admin->id,
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'tags' => ['regulations', 'compliance', 'UAE', 'FEMA'],
            ],
            [
                'title' => 'The Future of Digital Remittances',
                'slug' => 'the-future-of-digital-remittances',
                'excerpt' => 'How technology is revolutionizing the way we send money across borders.',
                'content' => '<p>The remittance industry is undergoing a digital transformation, driven by technological innovations and changing consumer expectations.</p>

<h3>Blockchain and Cryptocurrencies</h3>
<p>Blockchain technology promises to make cross-border transfers faster, cheaper, and more transparent. While still emerging, crypto-based remittances are gaining traction.</p>

<h3>Real-Time Payments</h3>
<p>Modern payment infrastructure enables near-instantaneous transfers, eliminating the traditional 2-3 day waiting period for international transfers.</p>

<h3>Mobile-First Solutions</h3>
<p>With smartphone penetration increasing globally, mobile apps are becoming the preferred channel for remittances, offering convenience and accessibility.</p>

<h3>AI and Machine Learning</h3>
<p>Artificial intelligence is being used to detect fraud, optimize exchange rates, and provide personalized customer experiences.</p>

<p>At IndiaUnity, we leverage these cutting-edge technologies to provide you with the fastest, most secure, and most affordable money transfer experience.</p>',
                'category_id' => 2,
                'admin_id' => $admin->id,
                'status' => 'published',
                'published_at' => now()->subDays(7),
                'tags' => ['fintech', 'blockchain', 'digital payments', 'technology'],
            ],
        ];

        foreach ($blogs as $blogData) {
            Blog::create($blogData);
        }

        // Create sample inquiries
        $inquiries = [
            [
                'name' => 'Rajesh Kumar',
                'email' => 'rajesh.kumar@email.com',
                'phone' => '+971501234567',
                'country' => 'UAE',
                'subject' => 'Question about transfer limits',
                'message' => 'Hi, I would like to know what are the maximum transfer limits for sending money to India. Also, what documents do I need to provide?',
                'status' => 'new',
                'created_at' => now()->subHours(2),
            ],
            [
                'name' => 'Priya Sharma',
                'email' => 'priya.sharma@email.com',
                'phone' => '+971507654321',
                'country' => 'UAE',
                'subject' => 'Mobile app availability',
                'message' => 'When will the IndiaUnity mobile app be available for download? I prefer using mobile apps for financial transactions.',
                'status' => 'in_progress',
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Amit Patel',
                'email' => 'amit.patel@email.com',
                'phone' => '+971509876543',
                'country' => 'UAE',
                'subject' => 'Exchange rate inquiry',
                'message' => 'What exchange rate do you offer for AED to INR transfers? Is it better than traditional banks?',
                'status' => 'resolved',
                'created_at' => now()->subDays(3),
            ],
        ];

        foreach ($inquiries as $inquiryData) {
            Inquiry::create($inquiryData);
        }
    }
}
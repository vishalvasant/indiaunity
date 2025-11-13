# IndiaUnity Landing Page & Admin Panel

A modern, responsive landing page for IndiaUnity with a comprehensive admin panel for managing blogs and inquiries. Built with Laravel, Bootstrap, and modern web technologies.

## Features

### Landing Page
- **Responsive Design**: Mobile-first design with modern fintech theme
- **Hero Section**: Compelling value proposition with 0.5% fees highlight
- **Features Section**: Key benefits and comparison table
- **Blog Integration**: Latest articles displayed on homepage
- **Testimonials**: Customer reviews and social proof
- **Contact Form**: Inquiry submission with validation
- **FAQ Section**: Comprehensive frequently asked questions
- **About Page**: Company mission, vision, and values

### Admin Panel
- **Secure Authentication**: Admin-only access with role-based permissions
- **Dashboard**: Overview of key metrics and recent activity
- **Blog Management**: Full CRUD operations for blog posts
- **Category Management**: Organize blogs with color-coded categories
- **Inquiry Management**: Handle customer inquiries with status tracking
- **Rich Text Editor**: Create and edit blog content with ease
- **Image Upload**: Featured images for blog posts
- **SEO Optimization**: Meta titles, descriptions, and tags

## Technology Stack

- **Backend**: Laravel 10.x
- **Frontend**: Bootstrap 5.3, HTML5, CSS3, JavaScript
- **Database**: MySQL
- **Image Processing**: Intervention Image
- **Icons**: Font Awesome 6.4
- **Fonts**: Google Fonts (Inter)
- **Animation**: AOS (Animate On Scroll)

## Installation

### Prerequisites
- PHP 8.1+
- Composer
- MySQL 5.7+
- Node.js & NPM (optional, for asset compilation)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd IndiaUnity
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   - Create a MySQL database named `indiaunity_landing`
   - Update `.env` file with your database credentials:
   ```
   DB_DATABASE=indiaunity_landing
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Create storage link**
   ```bash
   php artisan storage:link
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`

## Default Admin Credentials

- **Email**: admin@indiaunity.com
- **Password**: admin123

**Important**: Change these credentials in production!

## Configuration

### Email Settings
Update the mail configuration in `.env` for contact form functionality:
```
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@indiaunity.com
```

### Image Upload
Images are stored in `storage/app/public/blog-images/`. The seeder creates a symbolic link to make them accessible.

## Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Admin panel controllers
│   │   ├── HomeController.php
│   │   └── BlogController.php
│   ├── Models/              # Eloquent models
│   └── Http/Middleware/     # Authentication middleware
├── database/
│   ├── migrations/          # Database structure
│   └── seeders/            # Sample data
├── resources/views/
│   ├── layouts/            # Base layouts
│   ├── admin/              # Admin panel views
│   ├── blogs/              # Blog pages
│   ├── home.blade.php      # Landing page
│   ├── about.blade.php     # About page
│   └── faq.blade.php       # FAQ page
└── routes/
    └── web.php             # Application routes
```

## Key Features Explained

### Fintech Light Theme
- Clean, modern design optimized for financial services
- Professional color scheme with blue primary colors
- Subtle shadows and rounded corners for modern feel
- Responsive grid system for all device sizes

### Blog System
- SEO-optimized with meta tags and structured data
- Category-based organization with color coding
- Reading time estimation
- View counter and popular posts
- Tag system for better content discovery

### Inquiry Management
- Form validation and spam protection
- Status tracking (New, In Progress, Resolved, Closed)
- Admin notes and response tracking
- Email notifications (configurable)

### Security Features
- Admin authentication with middleware
- CSRF protection on all forms
- Input validation and sanitization
- Secure file upload handling

## Customization

### Styling
- Main colors defined in CSS variables in `layouts/app.blade.php`
- Bootstrap utility classes used throughout
- Custom CSS for specific components

### Content
- Update company information in views and seeder
- Modify FAQ content in `faq.blade.php`
- Customize about page content in `about.blade.php`

### Features
- Add new blog categories through admin panel
- Extend inquiry form fields as needed
- Add new pages by creating routes and views

## Production Deployment

1. **Environment**
   - Set `APP_ENV=production`
   - Set `APP_DEBUG=false`
   - Use secure `APP_KEY`

2. **Database**
   - Use production database credentials
   - Run migrations: `php artisan migrate --force`

3. **Assets**
   - Optimize autoloader: `composer install --optimize-autoloader --no-dev`
   - Cache configuration: `php artisan config:cache`
   - Cache routes: `php artisan route:cache`

4. **Security**
   - Change default admin credentials
   - Use HTTPS in production
   - Set up proper file permissions

## Support

For technical support or questions about this implementation:
- Create GitHub issues for bugs or feature requests
- Follow Laravel documentation for framework-specific questions
- Refer to Bootstrap documentation for styling customizations

## License

This project is proprietary software for IndiaUnity. All rights reserved.
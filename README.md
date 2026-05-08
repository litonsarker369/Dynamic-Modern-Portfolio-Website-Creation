# Modern Portfolio Website with Admin Panel

A full-featured portfolio website built with **Laravel 11** featuring a colorful gradient design, responsive layout, and a complete admin panel for managing content without touching code.

## Features

### Frontend
- Single-page portfolio design with smooth scrolling
- Animated gradient hero section
- About Me section with profile image
- Skills display with progress bars
- Filterable portfolio/projects grid
- Individual project detail pages
- Contact form with validation
- Social media links
- Fully responsive (mobile, tablet, desktop)
- AOS scroll animations
- SEO-friendly structure

### Admin Panel
- Secure login system
- Dashboard with stats overview
- **Projects**: Add, edit, delete with image upload
- **Skills**: Add, edit, delete with icons and percentages
- **Social Links**: Manage social media URLs
- **About Me**: Edit bio, headline, profile image, resume link
- **Contact Info**: Manage email, phone, address
- **Messages**: View and manage contact form submissions

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 11 (PHP 8.1+) |
| Database | MySQL / MariaDB |
| Frontend | HTML5, CSS3, Vanilla JavaScript |
| CSS Framework | Bootstrap 5 |
| Icons | Font Awesome 6 |
| Animations | AOS (Animate On Scroll) |
| Fonts | Google Fonts (Poppins) |

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL / MariaDB
- Node.js (for Vite, optional)
- XAMPP / WAMP / Laragon (recommended for local dev)

## Installation

### 1. Clone or extract files
Place the project in your web server directory (e.g., `htdocs/portfolio` for XAMPP).

### 2. Install dependencies
```bash
composer install
```

### 3. Configure environment
```bash
copy .env.example .env
```
Edit `.env` and set your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate app key
```bash
php artisan key:generate
```

### 5. Create database
Create a MySQL database named `portfolio` (or your chosen name) via phpMyAdmin or command line.

### 6. Run migrations & seeders
```bash
php artisan migrate
php artisan db:seed
```

### 7. Create storage link
```bash
php artisan storage:link
```

### 8. Start the server
```bash
php artisan serve
```

Visit **http://localhost:8000** to see the frontend.

## Admin Access

| URL | http://localhost:8000/admin/login |
| Email | admin@portfolio.com |
| Password | password |

## One-Click Setup (Windows)

Run `setup.bat` to automate steps 2-7.

## XAMPP Deployment

1. Move project folder to `C:\xampp\htdocs\portfolio`
2. Configure Apache to serve from `portfolio/public` (or use `.htaccess` rewrite)
3. Create MySQL database `portfolio` via phpMyAdmin
4. Run `setup.bat` or follow manual steps 2-7 above
5. Access at **http://localhost/portfolio/public**

For clean URLs, set the document root to `portfolio/public`:
```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/portfolio/public"
    ServerName portfolio.local
</VirtualHost>
```

## File Structure

```
/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── FrontendController.php
│   │   │   └── Admin/
│   │   │       ├── AuthController.php
│   │   │       ├── DashboardController.php
│   │   │       ├── ProjectController.php
│   │   │       ├── SkillController.php
│   │   │       ├── SocialLinkController.php
│   │   │       ├── ContactInfoController.php
│   │   │       ├── AboutController.php
│   │   │       └── MessageController.php
│   │   └── Middleware/AdminAuth.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Project.php
│   │   ├── Skill.php
│   │   ├── SocialLink.php
│   │   ├── ContactInfo.php
│   │   ├── Message.php
│   │   └── About.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── home.blade.php
│   ├── project-detail.blade.php
│   └── admin/
│       ├── layouts/admin.blade.php
│       ├── auth/login.blade.php
│       ├── dashboard.blade.php
│       ├── projects/ (index, create, edit)
│       ├── skills/index.blade.php
│       ├── social-links/index.blade.php
│       ├── about/edit.blade.php
│       ├── contact/index.blade.php
│       └── messages/ (index, show)
├── public/
│   ├── css/style.css
│   ├── js/main.js
│   ├── images/
│   └── uploads/
├── routes/web.php
├── setup.bat
└── README.md
```

## Customization

### Colors
Edit the CSS variables in `public/css/style.css`:
```css
:root {
    --primary: #667eea;
    --secondary: #764ba2;
    --accent: #f093fb;
    --accent2: #f5576c;
    --dark: #0f0c29;
}
```

### Content
All content is managed through the admin panel at `/admin/login`.

## License

MIT

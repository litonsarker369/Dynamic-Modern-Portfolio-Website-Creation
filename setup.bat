@echo off
echo ========================================
echo   Portfolio Website - Setup Script
echo ========================================
echo.

echo [1/6] Installing Composer dependencies...
call composer install
if %errorlevel% neq 0 (
    echo ERROR: Composer install failed. Make sure Composer is installed.
    pause
    exit /b %errorlevel%
)

echo [2/6] Creating .env file...
if not exist .env (
    copy .env.example .env
    echo .env file created. Please update your database credentials.
)

echo [3/6] Generating application key...
php artisan key:generate

echo [4/6] Running database migrations...
php artisan migrate

echo [5/6] Seeding database...
php artisan db:seed

echo [6/6] Creating storage link...
php artisan storage:link

echo.
echo ========================================
echo   Setup Complete!
echo ========================================
echo.
echo Admin Login:
echo   URL: http://localhost:8000/admin/login
echo   Email: admin@portfolio.com
echo   Password: password
echo.
echo To start the development server:
echo   php artisan serve
echo.
echo To run in XAMPP, configure Apache to point to:
echo   %cd%\public
echo.
pause

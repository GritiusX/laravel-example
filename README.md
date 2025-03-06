## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

# Laravel Blade App - Basic Setup Guide

## 📂 Project Structure

After installing Laravel, your project has the following structure:

```
/app           -> Backend logic (controllers, models, etc.).
/bootstrap     -> Framework bootstrapping files.
/config        -> Configuration files (database, authentication, etc.).
/database      -> Migrations and database seeders.
/public        -> Public entry point (index.php).
/resources     -> Views and assets (CSS, JS, images).
/routes        -> Defines web and API routes.
/storage       -> App-generated files (logs, cache, etc.).
/tests         -> Unit and feature tests.
```

---

## 🔧 Basic Configuration

### 1️⃣ Check `.env` File

Your Laravel app is configured with SQLite. Ensure your `.env` file includes:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

### 2️⃣ Create SQLite Database

Run the following command to create the database file:

```bash
touch database/database.sqlite
```

### 3️⃣ Run Migrations

Execute migrations to create the necessary database tables:

```bash
php artisan migrate
```

---

## 🚀 Routes and Controllers

### Web Routes (`routes/web.php`)

Laravel includes default routes:

```php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php'; // Authentication routes
```

### Authentication Routes (`routes/auth.php`)

If authentication is enabled, Laravel provides routes for login, registration, and password reset.

---

## 🎨 Frontend with Blade

### 1️⃣ View Files Structure (`resources/views/`)

-   `resources/views/welcome.blade.php` → Default home page.
-   Custom views should be placed in this directory.

### 2️⃣ Modify the Home Page

Edit `resources/views/welcome.blade.php`:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
</head>
<body>
    <h1>Welcome to My Laravel Application!</h1>
    <p>This is a basic Laravel setup with Blade.</p>
</body>
</html>
```

### 3️⃣ Create a New View and Route

-   Create `resources/views/about.blade.php`:

```blade
<h1>About Us</h1>
<p>This is the About page.</p>
```

-   Add a new route in `routes/web.php`:

```php
Route::get('/about', function () {
    return view('about');
});
```

### 4️⃣ Using Blade Layouts

-   Create a base layout in `resources/views/layouts/app.blade.php`:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>My Laravel App</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
```

-   Use the layout in `resources/views/about.blade.php`:

```blade
@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <h1>About Us</h1>
    <p>This is the About page.</p>
@endsection
```

---

## 🔄 Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000/` in your browser.

---

## 🚀 Deploying to Production

1️⃣ Build assets (if using Laravel Mix or Vite):

```bash
npm run build
```

2️⃣ Set environment variables in `.env`:

```env
APP_ENV=production
APP_DEBUG=false
```

Now your Laravel application with Blade is fully set up and ready for development! 🎉

## Extras

commands:
-- php artisan tinker
--- App\Models\Job::create(['title'=>'Programador Trainee','salary'=>'500']); //ejemplo

--php artisan vendor:publish

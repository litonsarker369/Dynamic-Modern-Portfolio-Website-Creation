<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="admin-body">
    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">Portfolio Admin</a>
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="fas fa-folder-open me-2"></i>Projects
                </a>
                <a href="{{ route('admin.skills.index') }}" class="nav-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                    <i class="fas fa-code me-2"></i>Skills
                </a>
                <a href="{{ route('admin.social-links.index') }}" class="nav-link {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}">
                    <i class="fas fa-share-alt me-2"></i>Social Links
                </a>
                <a href="{{ route('admin.about.edit') }}" class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                    <i class="fas fa-user me-2"></i>About Me
                </a>
                <a href="{{ route('admin.contact.index') }}" class="nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                    <i class="fas fa-address-card me-2"></i>Contact Info
                </a>
                <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope me-2"></i>Messages
                </a>
                <hr class="my-3">
                <a href="{{ route('home') }}" target="_blank" class="nav-link">
                    <i class="fas fa-external-link-alt me-2"></i>View Site
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn-logout">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-topbar">
                <button class="btn btn-sm sidebar-toggle" onclick="document.querySelector('.admin-wrapper').classList.toggle('sidebar-collapsed')">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="ms-auto">Welcome, {{ auth()->user()->name }}</span>
            </header>

            <div class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>

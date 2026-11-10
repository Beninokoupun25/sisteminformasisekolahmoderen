<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1433a3">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        (function () {
            try {
                var stored = localStorage.getItem('theme');
                var theme = stored || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
                document.documentElement.setAttribute('data-theme', theme);
            } catch (error) {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
    </script>
    <title>@yield('title', 'Dashboard — SMAN 17 MALTENG')</title>
    <meta name="description" content="@yield('description', 'Panel admin Sistem Informasi SMAN 17 MALTENG.')">
    <link rel="icon" type="image/png" href="{{ asset('logo22.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="admin-body">
    @php
        $currentUser = auth()->user();
        $roleLabel = $currentUser?->isAdmin()
            ? 'Administrator'
            : ucwords(str_replace('_', ' ', $currentUser?->role ?? 'Pengguna'));
    @endphp

    <aside class="sidebar" id="sidebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="logo" aria-hidden="true">
                <img src="{{ asset('logo22.png') }}" alt="">
            </span>
            <span>
                <small>Panel Admin</small>
                <strong>SMAN 17 MALTENG</strong>
            </span>
        </a>

        <nav class="nav" aria-label="Navigasi admin">
            <span class="nav-label">Utama</span>
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                Dashboard
            </a>

            @if ($currentUser?->isAdmin())
                <span class="nav-label">Konten</span>
                <a class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    Artikel
                </a>
                <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><path d="M7 9V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v5"/></svg>
                    Kategori
                </a>
                <a class="nav-link {{ request()->routeIs('admin.tags.*') ? 'active' : '' }}" href="{{ route('admin.tags.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12.59 12.59 2a2 2 0 0 1 2.83 0l7.17 7.17a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
                    Tag
                </a>
                <a class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    Galeri
                </a>
                <a class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}" href="{{ route('admin.events.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Kegiatan
                </a>

                <span class="nav-label">Interaksi</span>
                <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8z"/></svg>
                    Kontak
                </a>

                <span class="nav-label">Sistem</span>
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Pengguna
                </a>
                <a class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" href="{{ route('admin.profile.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 21v-6h6v6"/></svg>
                    Profil Sekolah
                </a>
            @endif

            <span class="nav-label">Akun</span>
            @if ($currentUser)
                <a class="nav-link {{ request()->routeIs('admin.users.show') && request()->route('user')?->is($currentUser) ? 'active' : '' }}" href="{{ route('admin.users.show', $currentUser) }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Profil Saya
                </a>
            @endif
            <a class="nav-link" href="{{ route('home') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11 12 4l9 7"/><path d="M5 10v10h14V10"/></svg>
                Kunjungi Beranda
            </a>
        </nav>

        <div class="sidebar-foot">
            &copy; {{ date('Y') }} SMAN 17 MALTENG
        </div>
    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="main">
        <header class="topbar">
            <button type="button" class="menu-btn" id="menuBtn" aria-label="Buka menu navigasi">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16"/><path d="M4 12h16"/><path d="M4 18h16"/></svg>
            </button>

            <div class="topbar-title">
                <h1>@yield('page-title', 'Dashboard')</h1>
                @hasSection('page-subtitle')
                    <p>@yield('page-subtitle')</p>
                @endif
            </div>

            <div class="user-chip">
                @if ($currentUser)
                    <a class="user-chip-link" href="{{ route('admin.users.show', $currentUser) }}" title="Buka profil saya">
                        <span class="avatar">{{ strtoupper(substr($currentUser->name, 0, 1)) }}</span>
                        <span class="meta">
                            <strong>{{ $currentUser->name }}</strong>
                            <small>{{ $roleLabel }}</small>
                        </span>
                    </a>
                @endif

                @if ($currentUser?->isAdmin())
                    <a class="icon-btn" href="{{ route('admin.contacts.index') }}" title="Pesan kontak" aria-label="Pesan kontak">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                        @if (($unreadContactCount ?? 0) > 0)
                            <span class="icon-badge">{{ $unreadContactCount > 9 ? '9+' : $unreadContactCount }}</span>
                        @endif
                    </a>
                @endif

                <button type="button" class="theme-toggle" id="themeToggle" title="Ganti tema" aria-label="Ganti tema">
                    <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                    <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="M4.93 4.93l1.42 1.42"/><path d="M17.66 17.66l1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="M6.34 17.66l-1.41 1.41"/><path d="M19.07 4.93l-1.41 1.41"/></svg>
                </button>

                <form class="logout-form" method="POST" action="{{ route('logout') }}" data-confirm="Keluar dari akun Anda?">
                    @csrf
                    <button type="submit" class="logout-btn" title="Keluar" aria-label="Keluar">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><path d="M10 17l5-5-5-5"/><path d="M15 12H3"/></svg>
                    </button>
                </form>
            </div>
        </header>

        <main class="content">
            @if (session('success'))
                <div class="alert alert-success" data-flash="success" data-message="{{ session('success') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="M22 4 12 14.01l-3-3"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" data-flash="error" data-message="{{ session('error') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function () {
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('sidebarOverlay');
            var menuBtn = document.getElementById('menuBtn');

            function closeSidebar() {
                if (!sidebar) return;
                sidebar.classList.remove('open');
                if (overlay) overlay.classList.remove('open');
            }

            if (menuBtn && sidebar) {
                menuBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('open');
                    if (overlay) overlay.classList.toggle('open');
                });
            }

            if (overlay) {
                overlay.addEventListener('click', closeSidebar);
            }

            var themeToggle = document.getElementById('themeToggle');

            function currentTheme() {
                return document.documentElement.getAttribute('data-theme') === 'dark' ? 'dark' : 'light';
            }

            function applyTheme(theme) {
                document.documentElement.setAttribute('data-theme', theme);
                try {
                    localStorage.setItem('theme', theme);
                } catch (error) {
                    /* ignore storage errors */
                }

                if (themeToggle) {
                    var nextLabel = theme === 'dark' ? 'Aktifkan mode terang' : 'Aktifkan mode gelap';
                    themeToggle.setAttribute('aria-label', nextLabel);
                    themeToggle.setAttribute('title', nextLabel);
                }
            }

            if (themeToggle) {
                applyTheme(currentTheme());
                themeToggle.addEventListener('click', function () {
                    applyTheme(currentTheme() === 'dark' ? 'light' : 'dark');
                });
            }

            document.querySelectorAll('[data-flash]').forEach(function (alert) {
                if (!window.Swal) return;

                var type = alert.dataset.flash === 'error' ? 'error' : 'success';
                var message = alert.dataset.message || alert.textContent.trim();
                alert.remove();

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: type,
                    title: message,
                    showConfirmButton: false,
                    timer: 3200,
                    timerProgressBar: true,
                });
            });

            document.querySelectorAll('form[data-confirm]').forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.dataset.confirmed === 'true') return;

                    event.preventDefault();

                    var message = form.dataset.confirm;

                    function submitForm() {
                        form.dataset.confirmed = 'true';
                        form.submit();
                    }

                    if (!window.Swal) {
                        if (window.confirm(message)) submitForm();
                        return;
                    }

                    Swal.fire({
                        title: 'Konfirmasi',
                        text: message,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, lanjutkan',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#1e4fd8',
                        cancelButtonColor: '#64748b',
                        reverseButtons: true,
                    }).then(function (result) {
                        if (result.isConfirmed) submitForm();
                    });
                });
            });

            document.querySelectorAll('.modal').forEach(function (modal) {
                modal.addEventListener('click', function (event) {
                    if (event.target === modal) modal.classList.remove('open');
                });
            });

            document.addEventListener('keydown', function (event) {
                if (event.key !== 'Escape') return;
                closeSidebar();
                document.querySelectorAll('.modal.open').forEach(function (modal) {
                    modal.classList.remove('open');
                });
            });
        })();
    </script>
    @stack('scripts')
</body>
</html>

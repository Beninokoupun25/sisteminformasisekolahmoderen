<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard — SMAN 17 MALTENG')</title>
    <meta name="description" content="@yield('description', 'Panel admin Sistem Informasi SMAN 17 MALTENG.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    <div class="admin-shell">
        <!-- Mobile sidebar overlay -->
        <div class="admin-overlay" id="adminOverlay" onclick="adminToggleSidebar(false)"></div>

        <aside class="admin-sidebar" id="adminSidebar" aria-label="Navigasi admin">
            <div class="admin-sidebar__head">
                <button class="admin-sidebar__close" id="adminSidebarClose" onclick="adminToggleSidebar(false)" aria-label="Tutup navigasi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
                <a class="admin-brand" href="{{ route('dashboard') }}">
                    <span class="brand__mark" aria-hidden="true">
                        <svg viewBox="0 0 32 32" fill="none">
                            <path d="M16 4 28 10 16 16 4 10 16 4Z" fill="currentColor"/>
                            <path d="M9 13v6c0 4 14 4 14 0v-6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                            <path d="M27 11v8" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                            <circle cx="27" cy="21" r="1.8" fill="currentColor"/>
                        </svg>
                    </span>
                    <span class="brand__text">
                        <strong>SMAN 17 MALTENG</strong>
                        <small>Panel Admin</small>
                    </span>
                </a>
            </div>

            <nav class="admin-nav">
                <a class="admin-nav__link @if(request()->routeIs('dashboard')) is-active @endif" href="{{ route('dashboard') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="3" width="8" height="8" rx="2"/><rect x="13" y="3" width="8" height="5" rx="2"/><rect x="13" y="10" width="8" height="11" rx="2"/><rect x="3" y="13" width="8" height="8" rx="2"/></svg>
                    Dashboard
                </a>
                <a class="admin-nav__link @if(request()->routeIs('admin.users.*')) is-active @endif" href="{{ route('admin.users.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Pengguna
                </a>
                <a class="admin-nav__link @if(request()->routeIs('admin.posts.*')) is-active @endif" href="{{ route('admin.posts.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    Artikel
                </a>
                <a class="admin-nav__link @if(request()->routeIs('admin.categories.*')) is-active @endif" href="{{ route('admin.categories.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><path d="M7 9V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v5"/></svg>
                    Kategori
                </a>
                <a class="admin-nav__link @if(request()->routeIs('admin.tags.*')) is-active @endif" href="{{ route('admin.tags.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12.59 12.59 2a2 2 0 0 1 2.83 0l7.17 7.17a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
                    Tag
                </a>
                <a class="admin-nav__link @if(request()->routeIs('admin.galleries.*')) is-active @endif" href="{{ route('admin.galleries.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    Galeri
                </a>
                <a class="admin-nav__link @if(request()->routeIs('admin.events.*')) is-active @endif" href="{{ route('admin.events.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Kegiatan
                </a>
                <a class="admin-nav__link @if(request()->routeIs('admin.contacts.*')) is-active @endif" href="{{ route('admin.contacts.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.63A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 0 7H5a2 2 0 0 1-2 2v3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 0 7H4a2 2 0 0 1 2 2h3"/></svg>
                    Kontak
                </a>
                @if(auth()->user()->isAdmin())
                <a class="admin-nav__link @if(request()->routeIs('admin.profile.*')) is-active @endif" href="{{ route('admin.profile.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Profil Sekolah
                </a>
                @endif
            </nav>

            <div class="admin-sidebar__foot">
                <a class="btn btn--ghost btn--sm w-full mt-4" href="{{ route('home') }}" style="justify-content: center;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M3 11 12 4l9 7"/><path d="M5 10v10h14V10"/></svg>
                    <span>Kunjungi Beranda</span>
                </a>
                <form class="admin-logout" method="POST" action="{{ route('logout') }}" style="margin-top: 10px;">
                    @csrf
                    <button type="submit" class="btn btn--ghost btn--sm w-full text-danger" style="justify-content: center;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M10 17 5 12l5-5"/><path d="M5 12h12"/><path d="M15 4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <div class="admin-main">
            <!-- Top navigation bar -->
            <header class="admin-topbar">
                <div class="admin-topbar__left">
                    <button class="admin-topbar__menu" id="adminSidebarToggle" onclick="adminToggleSidebar(true)" aria-label="Buka navigasi">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                    </button>
                    <div class="admin-breadcrumb">
                        <a href="{{ route('dashboard') }}">Beranda</a>
                        <span class="admin-breadcrumb__separator">/</span>
                        <span class="admin-breadcrumb__current">@yield('page-title', 'Dashboard')</span>
                    </div>
                </div>

                <div class="admin-topbar__center">
                    <div class="admin-search">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <input type="text" placeholder="Cari..." class="admin-search__input">
                    </div>
                </div>

                <div class="admin-topbar__right">
                    <div class="admin-topbar__notif" position="relative">
                        <button class="btn btn--ghost btn--sm p-3" style="padding: 8px 12px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                            <span class="admin-notif-badge">3</span>
                        </button>
                    </div>
                    <div class="admin-topbar__user">
                        <div class="admin-topbar__user-info">
                            <span class="admin-topbar__user-name">{{ auth()->user()->name }}</span>
                            <span class="admin-topbar__user-role">{{ ucfirst(auth()->user()->role) }}</span>
                        </div>
                        <span class="admin-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    </div>
                </div>
            </header>

            <main class="admin-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function adminToggleSidebar(open) {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('adminOverlay');
            const isOpen = open === undefined ? !sidebar.classList.contains('open') : open;

            if (isOpen) {
                sidebar.classList.add('open');
                overlay.classList.add('open');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.remove('open');
                overlay.classList.remove('open');
                document.body.style.overflow = '';
            }
        }

        // Close sidebar on escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                adminToggleSidebar(false);
            }
        });
    </script>
</body>
</html>

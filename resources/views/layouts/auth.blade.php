<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Log in — SMAN 17 MALTENG')</title>
    <meta name="description" content="@yield('description', 'Masuk ke Sistem Informasi SMAN 17 MALTENG.')">
    <link rel="icon" type="image/png" href="{{ asset('logo22.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="auth-page">
    <div class="auth-split">
        <aside class="auth-visual" style="background-image: url('{{ asset('2.jpeg') }}')">
            <a class="brand" href="{{ route('home') }}" aria-label="SMAN 17 MALTENG — Beranda">
                <span class="brand__mark" aria-hidden="true">
                    <img src="{{ asset('logo22.png') }}" alt="">
                </span>
                <span class="brand__text">
                    <strong>SMAN 17 MALTENG</strong>
                    <small>Sistem Informasi Sekolah</small>
                </span>
            </a>

            <div class="auth-visual__text">
                <span class="eyebrow eyebrow--light">Portal Akademik</span>
                <h2>Sistem Informasi SMAN 17 MALTENG</h2>
                <p>Kelola berita, galeri, dan informasi sekolah dalam satu tempat yang aman dan terpusat.</p>
            </div>

            <p class="auth-visual__foot">&copy; {{ date('Y') }} SMAN 17 MALTENG</p>
        </aside>

        <main class="auth-main">
            @yield('content')
        </main>
    </div>
</body>
</html>

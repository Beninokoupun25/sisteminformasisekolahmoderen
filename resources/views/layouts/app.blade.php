<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SMAN 17 MALTENG — Sistem Informasi Sekolah')</title>
    <meta name="description" content="@yield('description', 'Sistem Informasi SMAN 17 MALTENG — pusat informasi, berita, dan kegiatan sekolah.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a class="skip-link" href="#main">Lewati ke konten utama</a>

    <header class="site-header" id="siteHeader">
        <div class="container">
            <nav class="navbar" aria-label="Navigasi utama">
                <a class="brand" href="{{ route('home') }}" aria-label="SMAN 17 MALTENG — Beranda">
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
                        <small>Sistem Informasi Sekolah</small>
                    </span>
                </a>

                <button class="nav-toggle" id="navToggle" type="button" aria-controls="primaryNav" aria-expanded="false" aria-label="Buka menu">
                    <span></span><span></span><span></span>
                </button>

                <ul class="nav-links" id="primaryNav">
                    <li><a class="is-active" href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="#profil">Profil</a></li>
                    <li><a href="#program">Program</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                    <li class="nav-links__cta">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn--primary btn--sm">Log out</button>
                            </form>
                        @else
                            <a class="btn btn--primary btn--sm" href="{{ route('login') }}">Log in</a>
                        @endauth
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="footer" id="kontak">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__brand">
                    <a class="brand" href="{{ route('home') }}">
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
                            <small>Sistem Informasi Sekolah</small>
                        </span>
                    </a>
                    <p class="footer__desc">Membangun generasi cerdas, berkarakter, dan berdaya saing melalui pendidikan yang berkualitas.</p>
                    <div class="footer__social">
                        <a href="#" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                        </a>
                        <a href="#" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 3h-3a4 4 0 0 0-4 4v3H5v4h3v7h4v-7h3l1-4h-4V7a1 1 0 0 1 1-1h3Z"/></svg>
                        </a>
                        <a href="#" aria-label="YouTube">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="5.5" width="19" height="13" rx="4"/><path d="m10 9 5 3-5 3V9Z" fill="currentColor" stroke="none"/></svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4>Tautan Cepat</h4>
                    <ul>
                        <li><a href="#profil">Profil Sekolah</a></li>
                        <li><a href="#program">Program</a></li>
                        <li><a href="#berita">Berita &amp; Pengumuman</a></li>
                        <li><a href="#galeri">Galeri Kegiatan</a></li>
                    </ul>
                </div>

                <div>
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="{{ route('login') }}">Log in</a></li>
                        <li><a href="#kontak">Kalender Akademik</a></li>
                        <li><a href="#kontak">Ekstrakurikuler</a></li>
                        <li><a href="#kontak">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h4>Kontak</h4>
                    <ul class="footer__contact">
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 21s7-5.4 7-11a7 7 0 1 0-14 0c0 5.6 7 11 7 11Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                            <span>Jl. Pendidikan No. 123, Maluku Tengah, Maluku</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 4h3l2 5-2 1a12 12 0 0 0 6 6l1-2 5 2v3a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
                            <span>(022) 123-4567</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 6h16v12H4z"/><path d="m4 7 8 6 8-6"/></svg>
                            <span>info@sman17malteng.sch.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__bottom">
                <span>&copy; {{ date('Y') }} SMAN 17 MALTENG. Seluruh hak cipta dilindungi.</span>
                <span>Developer by Inoi. K, Arnol. N, Nisix. T & Inda W</span>
            </div>
        </div>
    </footer>
</body>
</html>

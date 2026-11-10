@extends('layouts.app')

@section('title', 'Beranda — SMAN 17 MALTENG')
@section('description', 'Selamat datang di SMAN 17 MALTENG. Pendidikan berkualitas yang memadukan prestasi akademik, karakter, dan keterampilan abad ke-21.')

@section('content')
<main id="main">
    <section class="hero hero--photo" style="background-image: url('{{ asset('image.png') }}')">
        <div class="container hero__grid">
            <div class="hero__content" data-reveal>
                <h1>Membangun Generasi <span class="accent">Cerdas</span>, Berkarakter, dan Berdaya Saing</h1>
                <p>Selamat datang di SMAN 17 MALTENG. Kami menghadirkan pendidikan berkualitas yang memadukan prestasi akademik, pengembangan karakter, dan keterampilan abad ke-21.</p>

                <div class="hero__actions">
                    <a class="btn btn--primary" href="#profil">
                        Jelajahi Profil
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                    </a>
                    <a class="btn btn--ghost" href="#kontak">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 4h3l2 5-2 1a12 12 0 0 0 6 6l1-2 5 2v3a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="profil">
        <div class="container profil__grid">
            <div class="profil__media" data-reveal>
                <div class="profil__backdrop" aria-hidden="true"></div>
                <div class="profil__card">
                    <img class="profil__photo" src="{{ asset('2.jpeg') }}" alt="Kegiatan siswa SMAN 17 MALTENG" loading="lazy">
                    <svg class="profil__quote-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 6H4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h3v1a2 2 0 0 1-2 2H4v2h1a4 4 0 0 0 4-4V6Zm11 0h-5a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h3v1a2 2 0 0 1-2 2h-1v2h1a4 4 0 0 0 4-4V6Z"/></svg>
                    <p>&ldquo;Pendidikan bukan hanya tentang nilai di atas kertas, tetapi tentang membentuk manusia yang utuh, berakhlak mulia, dan siap menghadapi tantangan zaman.&rdquo;</p>
                </div>
            </div>

            <div class="profil__body" data-reveal>
                <span class="eyebrow">Tentang Kami</span>
                <h2>Lebih dari sekadar tempat belajar</h2>
                <p>{{ $schoolProfile?->sejarah ?: 'SMAN 17 MALTENG adalah lingkungan belajar yang aman, inklusif, dan inspiratif. Kami memadukan kurikulum nasional dengan pembelajaran berbasis proyek agar setiap siswa tumbuh percaya diri dan siap berkontribusi.' }}</p>
                @if ($schoolProfile?->akreditasi)
                    <p><strong>Akreditasi:</strong> {{ $schoolProfile->akreditasi }}</p>
                @endif

                <ul class="check-list">
                    <li>
                        <span class="check" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m4 13 5 5L20 6"/></svg></span>
                        <div><strong>Kurikulum Merdeka</strong><span>Pembelajaran yang fleksibel dan berpusat pada siswa.</span></div>
                    </li>
                    <li>
                        <span class="check" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m4 13 5 5L20 6"/></svg></span>
                        <div><strong>Pembelajaran Berbasis Proyek</strong><span>Melatih kolaborasi, kreativitas, dan pemecahan masalah.</span></div>
                    </li>
                    <li>
                        <span class="check" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m4 13 5 5L20 6"/></svg></span>
                        <div><strong>Lingkungan Aman &amp; Nyaman</strong><span>Fasilitas lengkap dengan pengawasan yang peduli.</span></div>
                    </li>
                    <li>
                        <span class="check" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m4 13 5 5L20 6"/></svg></span>
                        <div><strong>Pembinaan Karakter</strong><span>Menumbuhkan integritas, empati, dan tanggung jawab.</span></div>
                    </li>
                </ul>

                <a class="btn btn--primary" href="#program">
                    Lihat Program Kami
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                </a>
            </div>
        </div>

        <div class="container">
            <div class="visi-misi" data-reveal>
                <div class="section__head">
                    <span class="eyebrow">Visi &amp; Misi</span>
                    <h2>Arah dan komitmen kami</h2>
                    <p>Landasan yang menuntun seluruh warga sekolah dalam mewujudkan pendidikan yang bermutu dan berkarakter.</p>
                </div>

                <div class="visi-misi__grid">
                    <article class="visi-card visi-card--visi">
                        <span class="visi-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
                        </span>
                        <h3>Visi</h3>
                        <p>{{ $schoolProfile?->visi ?: 'Mewujudkan peserta didik yang berakhlak mulia, berkarakter, berwawasan luas, dan peduli lingkungan dalam semangat Pancasila.' }}</p>
                    </article>

                    <article class="visi-card">
                        <span class="visi-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 21V4"/><path d="M4 4h11l-1.5 3L15 10H4"/><path d="M4 14h8l-1 2 1 2H4"/></svg>
                        </span>
                        <h3>Misi</h3>
                        <ol class="misi-list">
                            @forelse ($missions as $mission)
                                <li>{{ $mission }}</li>
                            @empty
                                <li>Menjadikan guru sebagai model pembelajaran yang menjadi contoh inspiratif bagi peserta didik.</li>
                                <li>Mengamalkan ibadah sesuai perintah agama.</li>
                                <li>Membiasakan sikap jujur, adil, dan mandiri dalam tindakan.</li>
                                <li>Mengedepankan sikap santun dalam berkomunikasi.</li>
                                <li>Membudayakan belajar tekun dan bekerja keras dalam mengatasi masalah.</li>
                                <li>Menumbuhkembangkan potensi kreativitas.</li>
                                <li>Mengasah kemampuan kognitif, psikomotorik, dan afektif sehingga mampu bertahan dalam berbagai keadaan.</li>
                                <li>Mendorong dan melatih semangat berprestasi serta kemampuan berkompetisi menghadapi persaingan global.</li>
                                <li>Memupuk budaya peduli dan rasa empati terhadap lingkungan sekitar.</li>
                                <li>Melatih sikap gotong royong dalam menghadapi masalah bersama.</li>
                                <li>Menumbuhkan rasa cinta terhadap tanah air.</li>
                                <li>Melestarikan kearifan lokal sebagai bagian dari kekayaan budaya bangsa.</li>
                            @endforelse
                        </ol>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--muted" id="program">
        <div class="container">
            <div class="section__head section__head--center" data-reveal>
                <span class="eyebrow">Program Unggulan</span>
                <h2>Ruang tumbuh untuk setiap potensi</h2>
                <p>Beragam program dirancang untuk mengembangkan minat, bakat, dan kompetensi siswa secara menyeluruh.</p>
            </div>

            <div class="card-grid">
                <article class="program-card" data-reveal>
                    <span class="program-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 5h7v14H4z"/><path d="M13 5h7v14h-7z"/><path d="M4 9h7M13 9h7"/></svg>
                    </span>
                    <h3>Akademik Unggul</h3>
                    <p>Pembelajaran mendalam dengan pendampingan guru berpengalaman dan kelas yang terstruktur.</p>
                </article>

                <article class="program-card" data-reveal>
                    <span class="program-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="2"/><path d="M12 2v4M12 18v4M2 12h4M18 12h4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M19.1 4.9l-2.8 2.8M7.7 16.3l-2.8 2.8"/></svg>
                    </span>
                    <h3>Sains &amp; Teknologi</h3>
                    <p>Laboratorium modern, robotika, dan literasi digital untuk menyiapkan talenta masa depan.</p>
                </article>

                <article class="program-card" data-reveal>
                    <span class="program-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3a9 9 0 1 0 0 18c1.7 0 2.5-1 2.5-2.2 0-.9-.4-1.3-.4-2.1 0-1.2.9-1.7 2-1.7H18a3 3 0 0 0 3-3A9 9 0 0 0 12 3Z"/><circle cx="7.5" cy="10.5" r="1" fill="currentColor" stroke="none"/><circle cx="10" cy="7" r="1" fill="currentColor" stroke="none"/><circle cx="14.5" cy="7.5" r="1" fill="currentColor" stroke="none"/></svg>
                    </span>
                    <h3>Seni &amp; Budaya</h3>
                    <p>Musik, tari, teater, dan seni visual sebagai sarana ekspresi dan pelestarian budaya.</p>
                </article>

                <article class="program-card" data-reveal>
                    <span class="program-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M8 4h8v5a4 4 0 0 1-8 0V4Z"/><path d="M8 6H5v2a4 4 0 0 0 4 4M16 6h3v2a4 4 0 0 1-4 4"/><path d="M12 13v4M9 20h6"/></svg>
                    </span>
                    <h3>Olahraga &amp; Kesehatan</h3>
                    <p>Pembinaan atletik, kebugaran, dan gaya hidup sehat untuk membentuk generasi tangguh.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section" id="berita">
        <div class="container">
            <div class="section__head section__head--split" data-reveal>
                <div>
                    <span class="eyebrow">Berita &amp; Pengumuman</span>
                    <h2>Kabar terbaru dari sekolah</h2>
                </div>
                <a class="btn btn--ghost btn--sm" href="{{ route('posts.index') }}">
                    Lihat semua
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                </a>
            </div>

            <div class="news-grid">
                @forelse ($posts as $post)
                    <article class="news-card" data-reveal>
                        <a
                            class="news-card__thumb news-card__thumb--a"
                            href="{{ route('posts.show', $post) }}"
                            aria-label="Baca {{ $post->title }}"
                            @if ($post->featured_image_url)
                                style="background-image: linear-gradient(180deg, rgba(6, 26, 58, 0.1), rgba(6, 26, 58, 0.55)), url('{{ $post->featured_image_url }}'); background-size: cover; background-position: center;"
                            @endif
                        >
                            <span class="news-card__cat">{{ $post->category?->name ?? ucfirst($post->type) }}</span>
                        </a>
                        <div class="news-card__body">
                            <span class="news-card__date">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="3"/><path d="M8 3v4M16 3v4M3 10h18"/></svg>
                                {{ $post->published_at->locale('id')->translatedFormat('d F Y') }}
                            </span>
                            <h3><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                            <p>{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->body), 140) }}</p>
                            <a class="news-card__link" href="{{ route('posts.show', $post) }}">
                                Baca selengkapnya
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <p class="home-empty">Belum ada berita atau pengumuman yang diterbitkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    @if ($upcomingEvents->isNotEmpty())
        <section class="section section--muted" id="agenda">
            <div class="container">
                <div class="section__head section__head--center" data-reveal>
                    <span class="eyebrow">Agenda Sekolah</span>
                    <h2>Kegiatan mendatang</h2>
                </div>
                <div class="news-grid">
                    @foreach ($upcomingEvents as $event)
                        <article class="news-card" data-reveal>
                            <div
                                class="news-card__thumb news-card__thumb--b"
                                @if ($event->image_url)
                                    style="background-image: linear-gradient(180deg, rgba(6, 26, 58, 0.1), rgba(6, 26, 58, 0.55)), url('{{ $event->image_url }}'); background-size: cover; background-position: center;"
                                @endif
                            >
                                <span class="news-card__cat">Kegiatan</span>
                            </div>
                            <div class="news-card__body">
                                <span class="news-card__date">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="3"/><path d="M8 3v4M16 3v4M3 10h18"/></svg>
                                    {{ $event->start_date->locale('id')->translatedFormat('d F Y') }}
                                    @if ($event->end_date)
                                        &ndash; {{ $event->end_date->locale('id')->translatedFormat('d F Y') }}
                                    @endif
                                </span>
                                <h3>{{ $event->title }}</h3>
                                @if ($event->description)
                                    <p>{{ $event->description }}</p>
                                @endif
                                @if ($event->location)
                                    <p><strong>Lokasi:</strong> {{ $event->location }}</p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="section section--tight section--muted" id="galeri">
        <div class="container">
            <div class="section__head section__head--center" data-reveal>
                <span class="eyebrow">Galeri Kegiatan</span>
                <h2>Momen yang membentuk cerita</h2>
                <p>Dokumentasi kegiatan belajar, prestasi, dan kebersamaan keluarga besar SMAN 17 MALTENG.</p>
            </div>

            <div class="gallery" data-reveal>
                @forelse ($galleries as $gallery)
                    <a
                        class="gallery__item gallery__item--{{ (($loop->index % 6) + 1) }}"
                        href="{{ asset('storage/' . $gallery->file_path) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Lihat foto: {{ $gallery->title }}"
                        style="background-image: linear-gradient(180deg, transparent 35%, rgba(6, 26, 58, 0.72)), url('{{ asset('storage/' . ($gallery->thumbnail_path ?: $gallery->file_path)) }}'); background-size: cover; background-position: center;"
                    >
                        <span class="gallery__tag">{{ $gallery->title }}</span>
                    </a>
                @empty
                    <p class="home-empty">Belum ada foto kegiatan yang ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section section--tight" id="lokasi">
        <div class="container">
            <div class="section__head section__head--split" data-reveal>
                <div>
                    <span class="eyebrow">Lokasi Sekolah</span>
                    <h2>Temukan kami di Waipia</h2>
                </div>
                <a class="btn btn--ghost btn--sm" href="https://www.google.com/maps/search/?api=1&amp;query=-3.2045,129.0234" target="_blank" rel="noopener noreferrer">
                    Buka di Google Maps
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 17 17 7"/><path d="M8 7h9v9"/></svg>
                </a>
            </div>

            <div class="location" data-reveal>
                <div class="location__map">
                    <iframe
                        src="https://maps.google.com/maps?q=-3.2045,129.0234&amp;z=16&amp;hl=id&amp;output=embed"
                        title="Lokasi SMA Negeri 17 Maluku Tengah"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>

                <aside class="location__info">
                    <h3>SMA Negeri 17 Maluku Tengah</h3>
                    <p>Kunjungi kampus kami di Waipia untuk mendapatkan informasi langsung mengenai sekolah.</p>

                    <ul class="location__list">
                        <li>
                            <span class="location__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 21s7-5.4 7-11a7 7 0 1 0-14 0c0 5.6 7 11 7 11Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                            </span>
                            <div>
                                <strong>Alamat</strong>
                                <span>Jl. Haji Adam Malik-Waipia, Layeni, Kec. Teon Nila Serua, Kab. Maluku Tengah, Maluku 97558</span>
                            </div>
                        </li>
                        <li>
                            <span class="location__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 6h16v12H4z"/><path d="m4 7 8 6 8-6"/></svg>
                            </span>
                            <div>
                                <strong>Email</strong>
                                <span>sman17malteng@gmail.com</span>
                            </div>
                        </li>
                        <li>
                            <span class="location__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                            </span>
                            <div>
                                <strong>Jam Operasional</strong>
                                <span>Senin &ndash; Jumat, 07.00 &ndash; 16.00 WIT</span>
                            </div>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="cta" data-reveal>
                <div class="cta__content">
                    <span class="eyebrow eyebrow--light">Portal Akademik</span>
                    <h2>Masuk ke Sistem Informasi Sekolah</h2>
                    <p>Akses khusus untuk admin, operator, dan guru dalam mengelola konten serta informasi SMAN 17 MALTENG.</p>
                    <div class="cta__actions">
                        <a class="btn btn--light" href="{{ route('login') }}">Log in</a>
                        <a class="btn btn--outline-light" href="mailto:sman17malteng@gmail.com">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 6h16v12H4z"/><path d="m4 7 8 6 8-6"/></svg>
                            Email Admin
                        </a>
                    </div>
                </div>
                <div class="cta__info">
                    <div class="cta__info-item">
                        <strong>Admin</strong>
                        <span>Kelola berita, galeri, dan pengguna</span>
                    </div>
                    <div class="cta__info-item">
                        <strong>Operator</strong>
                        <span>Kelola konten dan dokumentasi kegiatan</span>
                    </div>
                    <div class="cta__info-item">
                        <strong>Bantuan</strong>
                        <span>Senin &ndash; Jumat, 07.00 &ndash; 16.00 WIT</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

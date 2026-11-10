@extends('layouts.admin')

@section('title', 'Dashboard — SMAN 17 MALTENG')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan aktivitas dan data terbaru dari sistem informasi sekolah.')

@section('content')
    <div class="welcome-card">
        <div class="welcome-text">
            <span class="welcome-tag welcome-calendar">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                {{ now()->locale('id')->translatedFormat('l, d F Y') }}
            </span>
            <h2>{{ $greeting }}, {{ auth()->user()->name }}</h2>
            <p>Berikut ringkasan data dan aktivitas terbaru sistem informasi sekolah. Semua yang perlu Anda kelola ada di satu tempat.</p>
        </div>
        <div class="page-actions">
            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tulis Artikel
            </a>
            <a class="btn btn-outline" href="{{ route('home') }}" target="_blank" rel="noopener">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Lihat Website
            </a>
        </div>
    </div>

    <div class="grid grid-4" style="margin-top: 18px;">
        <article class="stat-card blue">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <strong>{{ $userCount }}</strong>
            <span class="stat-label">Total Pengguna</span>
            <span class="stat-hint">Akun terdaftar di sistem</span>
        </article>

        <article class="stat-card violet">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <strong>{{ $publishedPostCount }}</strong>
            <span class="stat-label">Artikel Publik</span>
            <span class="stat-hint">{{ $draftPostCount }} draf menunggu terbit</span>
        </article>

        <article class="stat-card amber">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            </div>
            <strong>{{ $galleryCount }}</strong>
            <span class="stat-label">Item Galeri</span>
            <span class="stat-hint">Foto dan video kegiatan</span>
        </article>

        <article class="stat-card green">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <strong>{{ $eventCount }}</strong>
            <span class="stat-label">Kegiatan Mendatang</span>
            <span class="stat-hint">Jadwal kegiatan akademik</span>
        </article>
    </div>

    <div class="dash-main">
        <section class="card">
            <div class="card-head">
                <div>
                    <h3>Statistik Artikel</h3>
                    <p>Jumlah artikel dibuat dalam 6 bulan terakhir</p>
                </div>
                <span class="badge-status badge-info">{{ $postCount }} total</span>
            </div>
            <div class="card-body">
                <div class="dash-chart" role="img" aria-label="Grafik artikel per bulan">
                    @foreach ($postMonths as $month)
                        <div class="dash-chart__col">
                            <span class="dash-chart__value">{{ $month['count'] }}</span>
                            <div class="dash-chart__track">
                                <div class="dash-chart__bar" style="height: {{ max(4, round($month['count'] / $maxMonthlyPosts * 100)) }}%"></div>
                            </div>
                            <span class="dash-chart__label">{{ $month['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="card">
            <div class="card-head">
                <div>
                    <h3>Aksi Cepat</h3>
                    <p>Pintasan pengelolaan konten</p>
                </div>
            </div>
            <div class="card-body">
                <div class="list">
                    <a class="list-row" href="{{ route('admin.posts.create') }}">
                        <span class="icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                        </span>
                        <span class="info">
                            <strong>Tulis Artikel</strong>
                            <small>Buat berita atau pengumuman baru</small>
                        </span>
                        <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                    <a class="list-row" href="{{ route('admin.events.create') }}">
                        <span class="icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </span>
                        <span class="info">
                            <strong>Tambah Kegiatan</strong>
                            <small>Jadwalkan kegiatan akademik</small>
                        </span>
                        <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                    <a class="list-row" href="{{ route('admin.galleries.create') }}">
                        <span class="icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        </span>
                        <span class="info">
                            <strong>Unggah Galeri</strong>
                            <small>Tambah foto dan video kegiatan</small>
                        </span>
                        <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                    <a class="list-row" href="{{ route('admin.users.create') }}">
                        <span class="icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </span>
                        <span class="info">
                            <strong>Kelola Pengguna</strong>
                            <small>Tambah atau edit akun admin</small>
                        </span>
                        <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <section class="card" style="margin-top: 18px;">
        <div class="card-head">
            <div>
                <h3>Artikel Terbaru</h3>
                <p>Artikel yang paling baru ditambahkan</p>
            </div>
            <a href="{{ route('admin.posts.index') }}">Lihat semua</a>
        </div>

        @if ($latestPosts->isEmpty())
            <div class="empty">
                <span class="icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </span>
                <strong>Belum ada artikel</strong>
                <p>Mulai dengan menulis artikel atau pengumuman pertama Anda.</p>
            </div>
        @else
            <div class="table-wrap">
                <table class="data-table table-responsive">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestPosts as $post)
                            <tr>
                                <td data-label="Judul">
                                    <span class="cell-title">{{ $post->title }}</span>
                                </td>
                                <td data-label="Kategori">{{ $post->category->name ?? '-' }}</td>
                                <td data-label="Status">
                                    <span class="badge-status badge-{{ $post->status === 'publish' ? 'success' : 'warning' }}">{{ $post->status }}</span>
                                </td>
                                <td data-label="Aksi">
                                    <a class="btn btn-outline btn-sm" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

    <div class="grid grid-3" style="margin-top: 18px;">
        <section class="card">
            <div class="card-head">
                <div>
                    <h3>Kegiatan Mendatang</h3>
                    <p>Jadwal terdekat</p>
                </div>
                <a href="{{ route('admin.events.index') }}">Semua</a>
            </div>
            <div class="card-body">
                @if ($upcomingEvents->isEmpty())
                    <div class="empty">
                        <strong>Belum ada kegiatan</strong>
                        <p>Tidak ada kegiatan mendatang saat ini.</p>
                    </div>
                @else
                    <div class="list">
                        @foreach ($upcomingEvents as $event)
                            <a class="list-row" href="{{ route('admin.events.show', $event) }}">
                                <span class="dash-date-chip">
                                    <strong>{{ $event->start_date->format('d') }}</strong>
                                    <span>{{ $event->start_date->locale('id')->translatedFormat('M') }}</span>
                                </span>
                                <span class="info">
                                    <strong>{{ $event->title }}</strong>
                                    <small>{{ $event->location ?: 'Lokasi belum diatur' }}</small>
                                </span>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <section class="card">
            <div class="card-head">
                <div>
                    <h3>Pesan Terbaru</h3>
                    <p>{{ $unreadContactCount }} pesan belum dibaca</p>
                </div>
                <a href="{{ route('admin.contacts.index') }}">Semua</a>
            </div>
            <div class="card-body">
                @if ($latestContacts->isEmpty())
                    <div class="empty">
                        <strong>Belum ada pesan</strong>
                        <p>Pesan dari formulir kontak akan tampil di sini.</p>
                    </div>
                @else
                    <div class="list">
                        @foreach ($latestContacts as $contact)
                            <a class="list-row" href="{{ route('admin.contacts.show', $contact) }}">
                                <span class="icon">{{ strtoupper(substr($contact->name, 0, 1)) }}</span>
                                <span class="info">
                                    <strong>{{ $contact->name }}</strong>
                                    <small>{{ $contact->subject ?: 'Tanpa subjek' }} &middot; {{ $contact->created_at?->diffForHumans() }}</small>
                                </span>
                                @if (! $contact->read_at)
                                    <span class="dash-unread-dot" title="Belum dibaca"></span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <section class="card">
            <div class="card-head">
                <div>
                    <h3>Pengguna Baru</h3>
                    <p>Akun yang baru bergabung</p>
                </div>
                <a href="{{ route('admin.users.index') }}">Semua</a>
            </div>
            <div class="card-body">
                @if ($latestUsers->isEmpty())
                    <div class="empty">
                        <strong>Belum ada pengguna</strong>
                        <p>Akun yang baru dibuat akan tampil di sini.</p>
                    </div>
                @else
                    <div class="list">
                        @foreach ($latestUsers as $user)
                            <a class="list-row" href="{{ route('admin.users.show', $user) }}">
                                <span class="icon">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                <span class="info">
                                    <strong>{{ $user->name }}</strong>
                                    <small>{{ ucfirst($user->role) }} &middot; {{ $user->created_at?->diffForHumans() }}</small>
                                </span>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection

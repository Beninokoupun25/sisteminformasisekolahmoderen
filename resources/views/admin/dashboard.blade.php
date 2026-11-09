@extends('layouts.admin')

@section('title', 'Dashboard — SMAN 17 MALTENG')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan aktivitas dan data terbaru dari sistem informasi sekolah.')

@section('content')
    <!-- Statistic cards -->
    <div class="admin-stat-grid">
        <article class="stat-card stat-card--primary">
            <div class="stat-card__body">
                <span class="stat-card__label">Total Pengguna</span>
                <strong class="stat-card__value">{{ $userCount }}</strong>
                <span class="stat-card__hint">Akun aktif di sistem</span>
            </div>
            <div class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
        </article>
        <article class="stat-card stat-card--success">
            <div class="stat-card__body">
                <span class="stat-card__label">Artikel Publik</span>
                <strong class="stat-card__value">{{ $postCount ?? 0 }}</strong>
                <span class="stat-card__hint">Artikel yang sudah dipublikasikan</span>
            </div>
            <div class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
            </div>
        </article>
        <article class="stat-card stat-card--info">
            <div class="stat-card__body">
                <span class="stat-card__label">Item Galeri</span>
                <strong class="stat-card__value">{{ $galleryCount ?? 0 }}</strong>
                <span class="stat-card__hint">Foto dan video kegiatan</span>
            </div>
            <div class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            </div>
        </article>
        <article class="stat-card stat-card--warning">
            <div class="stat-card__body">
                <span class="stat-card__label">Kegiatan Mendatang</span>
                <strong class="stat-card__value">{{ $eventCount ?? 0 }}</strong>
                <span class="stat-card__hint">Jadwal kegiatan akademik</span>
            </div>
            <div class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
        </article>
    </div>

    <div class="admin-grid">
        <!-- Quick actions -->
        <section class="admin-card admin-card--wide">
            <div class="admin-card__head">
                <h2>Aksi Cepat</h2>
            </div>
            <div class="admin-quick-grid">
                <a class="quick-card quick-card--primary" href="{{ route('admin.posts.create') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    <div>
                        <strong>Tulis Artikel</strong>
                        <span>Buat berita atau pengumuman baru</span>
                    </div>
                </a>
                <a class="quick-card quick-card--success" href="{{ route('admin.events.create') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <div>
                        <strong>Tambah Kegiatan</strong>
                        <span>Jadwalkan kegiatan akademik baru</span>
                    </div>
                </a>
                <a class="quick-card quick-card--info" href="{{ route('admin.galleries.create') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    <div>
                        <strong>Unggah Galeri</strong>
                        <span>Tambah foto dan video kegiatan</span>
                    </div>
                </a>
                <a class="quick-card quick-card--ghost" href="{{ route('admin.users.create') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <div>
                        <strong>Kelola Pengguna</strong>
                        <span>Tambah atau edit akun admin</span>
                    </div>
                </a>
            </div>
        </section>

        <!-- Recent activity -->
        <section class="admin-card admin-card--wide">
            <div class="admin-card__head">
                <h2>Aktivitas Terbaru</h2>
                <a class="btn btn--ghost btn--sm" href="{{ route('admin.contacts.index') }}">Lihat Semua</a>
            </div>

            @if ($latestUsers->isEmpty())
                <p class="admin-empty">Belum ada aktivitas terbaru.</p>
            @else
                <div class="admin-activity-list">
                    @foreach ($latestUsers as $user)
                        <div class="admin-activity-item">
                            <div class="admin-activity__avatar">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="admin-activity__body">
                                <div class="admin-activity__title">
                                    {{ $user->name }} bergabung
                                </div>
                                <div class="admin-activity__meta">
                                    <span class="admin-activity__role">{{ ucfirst($user->role) }}</span>
                                    <time>{{ $user->created_at?->diffForHumans() }}</time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>

    <!-- Recent posts preview -->
    @if ($latestPosts ?? false)
    <section class="admin-card admin-card--wide">
        <div class="admin-card__head">
            <h2>Artikel Terbaru</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.posts.index') }}">Lihat Semua</a>
        </div>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th class="admin-table__col--action">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestPosts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name ?? '-' }}</td>
                            <td>
                                <span class="badge badge--{{ $post->status === 'publish' ? 'success' : 'secondary' }}">{{ $post->status }}</span>
                            </td>
                            <td>
                                <a class="btn btn--ghost btn--sm" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @endif
@endsection

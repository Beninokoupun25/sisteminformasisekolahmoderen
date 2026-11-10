@extends('layouts.app')

@section('title', 'Berita & Pengumuman — SMAN 17 MALTENG')
@section('description', 'Kumpulan berita, prestasi, dan pengumuman terbaru SMAN 17 MALTENG.')

@section('content')
    <main id="main" class="posts-page">
        <section class="section section--tight">
            <div class="container">
                <div class="section__head" data-reveal>
                    <span class="eyebrow">Berita &amp; Pengumuman</span>
                    <h2>Semua kabar dari sekolah</h2>
                    <p>Ikuti perkembangan, prestasi, dan informasi terbaru dari SMAN 17 MALTENG.</p>
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

                @if ($posts->hasPages())
                    <nav class="pagination" aria-label="Navigasi halaman berita">
                        @if ($posts->onFirstPage())
                            <span class="pagination__link is-disabled">Sebelumnya</span>
                        @else
                            <a class="pagination__link" href="{{ $posts->previousPageUrl() }}">Sebelumnya</a>
                        @endif
                        <span class="pagination__info">Halaman {{ $posts->currentPage() }} dari {{ $posts->lastPage() }}</span>
                        @if ($posts->hasMorePages())
                            <a class="pagination__link" href="{{ $posts->nextPageUrl() }}">Berikutnya</a>
                        @else
                            <span class="pagination__link is-disabled">Berikutnya</span>
                        @endif
                    </nav>
                @endif
            </div>
        </section>
    </main>
@endsection

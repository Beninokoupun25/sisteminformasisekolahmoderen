@extends('layouts.app')

@section('title', $post->title.' — SMAN 17 MALTENG')
@section('description', \Illuminate\Support\Str::limit(strip_tags($post->excerpt ?: $post->body), 150))

@section('content')
    <main id="main" class="article-page">
        <div class="container article-page__container">
            <nav class="article-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <a href="{{ route('posts.index') }}">Berita &amp; Pengumuman</a>
                <span>/</span>
                <span>{{ \Illuminate\Support\Str::limit($post->title, 60) }}</span>
            </nav>

            <article class="article">
                <header class="article__header">
                    <span class="eyebrow">{{ $post->category?->name ?? ucfirst($post->type) }}</span>
                    <h1>{{ $post->title }}</h1>
                    <div class="article__meta">
                        <span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="3"/><path d="M8 3v4M16 3v4M3 10h18"/></svg>
                            {{ $post->published_at?->locale('id')->translatedFormat('d F Y') }}
                        </span>
                        @if ($post->author)
                            <span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
                                {{ $post->author->name }}
                            </span>
                        @endif
                    </div>
                </header>

                @if ($post->featured_image_url)
                    <figure class="article__figure">
                        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}">
                    </figure>
                @endif

                @if ($post->excerpt)
                    <p class="article__lead">{{ $post->excerpt }}</p>
                @endif

                <div class="article__content">
                    {!! nl2br(e($post->body)) !!}
                </div>

                @if ($post->tags->isNotEmpty())
                    <div class="article__tags">
                        @foreach ($post->tags as $tag)
                            <span class="article__tag">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif

                <div class="article__actions">
                    <a class="btn btn--ghost" href="{{ route('home') }}#berita">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5"/><path d="m11 18-6-6 6-6"/></svg>
                        Kembali ke Berita
                    </a>
                </div>
            </article>
        </div>
    </main>
@endsection

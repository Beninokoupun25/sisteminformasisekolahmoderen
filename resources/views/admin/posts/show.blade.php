@extends('layouts.admin')

@section('title', 'Detail Artikel — Admin')
@section('page-title', 'Detail Artikel')
@section('page-subtitle', 'Lihat konten lengkap artikel.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>{{ $post->title }}</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.posts.index') }}">Kembali</a>
        </div>

        <div class="admin-card__body">
            <dl class="admin-detail">
                <dt>Slug</dt>
                <dd>{{ $post->slug }}</dd>
                <dt>Kategori</dt>
                <dd>{{ $post->category->name ?? '-' }}</dd>
                <dt>Penulis</dt>
                <dd>{{ $post->author->name ?? '-' }}</dd>
                <dt>Status</dt>
                <dd><span class="badge badge--{{ $post->status === 'publish' ? 'success' : 'warning' }}">{{ $post->status }}</span></dd>
                <dt>Tipe</dt>
                <dd>{{ $post->type ?? '-' }}</dd>
                <dt>Excerpt</dt>
                <dd>{{ $post->excerpt ?? '-' }}</dd>
                <dt>Dipublikasikan</dt>
                <dd>{{ $post->published_at?->format('d M Y H:i') ?? '-' }}</dd>
                <dt>Dibuat</dt>
                <dd>{{ $post->created_at->format('d M Y H:i') }}</dd>
            </dl>
        </div>

        <div class="admin-card__body">
            <h3>Isi</h3>
            <div class="admin-prose">{{ $post->body }}</div>
        </div>

        <div class="admin-card__body">
            <h3>Tags ({{ $post->tags->count() }})</h3>
            @if ($post->tags->isEmpty())
                <p class="admin-empty">Belum ada tag.</p>
            @else
                <div class="admin-tags">
                    @foreach ($post->tags as $tag)
                        <span class="badge">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

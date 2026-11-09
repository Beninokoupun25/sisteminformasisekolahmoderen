@extends('layouts.admin')

@section('title', 'Detail Kategori — Admin')
@section('page-title', 'Detail Kategori')
@section('page-subtitle', 'Lihat kategori dan artikel yang termasuk di dalamnya.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>{{ $category->name }}</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.categories.index') }}">Kembali</a>
        </div>

        <div class="admin-card__body">
            <dl class="admin-detail">
                <dt>Slug</dt>
                <dd>{{ $category->slug }}</dd>
                <dt>Deskripsi</dt>
                <dd>{{ $category->description ?? '-' }}</dd>
                <dt>Dibuat</dt>
                <dd>{{ $category->created_at->format('d M Y H:i') }}</dd>
            </dl>
        </div>

        <div class="admin-card__body">
            <h3>Artikel ({{ $category->posts->count() }})</h3>
            @if ($category->posts->isEmpty())
                <p class="admin-empty">Belum ada artikel dalam kategori ini.</p>
            @else
                <table class="admin-table">
                    <thead>
                        <tr><th>Judul</th><th>Status</th><th>Penulis</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($category->posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->status }}</td>
                                <td>{{ $post->author->name ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection

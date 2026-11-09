@extends('layouts.admin')

@section('title', 'Detail Tag — Admin')
@section('page-title', 'Detail Tag')
@section('page-subtitle', 'Lihat artikel yang memiliki tag ini.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>{{ $tag->name }}</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.tags.edit', $tag) }}">Edit</a>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.tags.index') }}">Kembali</a>
        </div>

        <div class="admin-card__body">
            <dl class="admin-detail">
                <dt>Slug</dt>
                <dd>{{ $tag->slug }}</dd>
                <dt>Dibuat</dt>
                <dd>{{ $tag->created_at->format('d M Y H:i') }}</dd>
            </dl>
        </div>

        <div class="admin-card__body">
            <h3>Artikel ({{ $tag->posts->count() }})</h3>
            @if ($tag->posts->isEmpty())
                <p class="admin-empty">Belum ada artikel dengan tag ini.</p>
            @else
                <table class="admin-table">
                    <thead>
                        <tr><th>Judul</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($tag->posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection

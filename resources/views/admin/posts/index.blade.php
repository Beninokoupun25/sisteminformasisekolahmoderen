@extends('layouts.admin')

@section('title', 'Post — Admin')
@section('page-title', 'Artikel')
@section('page-subtitle', 'Kelola artikel, berita, dan pengumuman.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Daftar Artikel</h2>
            <a class="btn btn--primary btn--sm" href="{{ route('admin.posts.create') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Artikel
            </a>
        </div>

        @if ($posts->isEmpty())
            <p class="admin-empty">Belum ada artikel.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th class="admin-table__col--action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name ?? '-' }}</td>
                                <td>{{ $post->author->name ?? '-' }}</td>
                                <td><span class="badge badge--{{ $post->status === 'publish' ? 'success' : 'warning' }}">{{ $post->status }}</span></td>
                                <td>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.posts.show', $post) }}">Lihat</a>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--ghost btn--sm text-danger" onclick="return confirm('Yakin menghapus artikel ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $posts->links() }}
        @endif
    </div>
@endsection

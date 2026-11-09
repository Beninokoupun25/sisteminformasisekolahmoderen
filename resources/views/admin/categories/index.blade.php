@extends('layouts.admin')

@section('title', 'Kategori — Admin')
@section('page-title', 'Kategori')
@section('page-subtitle', 'Kelola kategori konten artikel dan berita.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Daftar Kategori</h2>
            <a class="btn btn--primary btn--sm" href="{{ route('admin.categories.create') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Kategori
            </a>
        </div>

        @if ($categories->isEmpty())
            <p class="admin-empty">Belum ada kategori.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Deskripsi</th>
                            <th class="admin-table__col--action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="text-muted">{{ $category->slug }}</td>
                                <td>{{ $category->description ?? '-' }}</td>
                                <td>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.categories.show', $category) }}">Lihat</a>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--ghost btn--sm text-danger" onclick="return confirm('Yakin menghapus kategori ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        @endif
    </div>
@endsection

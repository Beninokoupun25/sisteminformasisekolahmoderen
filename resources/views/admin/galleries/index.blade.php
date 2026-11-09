@extends('layouts.admin')

@section('title', 'Galeri — Admin')
@section('page-title', 'Galeri')
@section('page-subtitle', 'Kelola foto dan video kegiatan sekolah.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Daftar Galeri</h2>
            <a class="btn btn--primary btn--sm" href="{{ route('admin.galleries.create') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Galeri
            </a>
        </div>

        @if ($galleries->isEmpty())
            <p class="admin-empty">Belum ada item galeri.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tipe</th>
                            <th>Pengunggah</th>
                            <th class="admin-table__col--action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>{{ $gallery->title }}</td>
                                <td>{{ $gallery->type }}</td>
                                <td>{{ $gallery->user->name ?? '-' }}</td>
                                <td>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.galleries.show', $gallery) }}">Lihat</a>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.galleries.edit', $gallery) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--ghost btn--sm text-danger" onclick="return confirm('Yakin menghapus item galeri ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $galleries->links() }}
        @endif
    </div>
@endsection

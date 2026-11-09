@extends('layouts.admin')

@section('title', 'Tag — Admin')
@section('page-title', 'Tag')
@section('page-subtitle', 'Kelola tag artikel.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Daftar Tag</h2>
            <a class="btn btn--primary btn--sm" href="{{ route('admin.tags.create') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Tag
            </a>
        </div>

        @if ($tags->isEmpty())
            <p class="admin-empty">Belum ada tag.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th class="admin-table__col--action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td class="text-muted">{{ $tag->slug }}</td>
                                <td>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.tags.show', $tag) }}">Lihat</a>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.tags.edit', $tag) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--ghost btn--sm text-danger" onclick="return confirm('Yakin menghapus tag ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $tags->links() }}
        @endif
    </div>
@endsection

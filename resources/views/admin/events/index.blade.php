@extends('layouts.admin')

@section('title', 'Event — Admin')
@section('page-title', 'Kegiatan')
@section('page-subtitle', 'Kelola jadwal kegiatan akademik.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Daftar Kegiatan</h2>
            <a class="btn btn--primary btn--sm" href="{{ route('admin.events.create') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Kegiatan
            </a>
        </div>

        @if ($events->isEmpty())
            <p class="admin-empty">Belum ada kegiatan.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Lokasi</th>
                            <th class="admin-table__col--action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->start_date->format('d M Y') }}</td>
                                <td>{{ $event->end_date?->format('d M Y') ?? '-' }}</td>
                                <td>{{ $event->location ?? '-' }}</td>
                                <td>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.events.show', $event) }}">Lihat</a>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.events.edit', $event) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.events.destroy', $event) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--ghost btn--sm text-danger" onclick="return confirm('Yakin menghapus kegiatan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $events->links() }}
        @endif
    </div>
@endsection

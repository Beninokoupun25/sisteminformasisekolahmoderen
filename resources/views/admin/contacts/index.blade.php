@extends('layouts.admin')

@section('title', 'Kontak — Admin')
@section('page-title', 'Pesan Kontak')
@section('page-subtitle', 'Kelola pesan masuk dari formulir kontak.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Daftar Pesan Kontak</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('home') }}">Kembali ke Beranda</a>
        </div>

        @if ($contacts->isEmpty())
            <p class="admin-empty">Belum ada pesan kontak.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th>Status</th>
                            <th class="admin-table__col--action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>
                                    <span class="badge badge--{{ $contact->read_at ? 'success' : 'warning' }}">
                                        {{ $contact->read_at ? 'Dibaca' : 'Belum Dibaca' }}
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.contacts.show', $contact) }}">Lihat</a>
                                    <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--ghost btn--sm text-danger" onclick="return confirm('Yakin menghapus pesan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $contacts->links() }}
        @endif
    </div>
@endsection

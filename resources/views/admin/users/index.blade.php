@extends('layouts.admin')

@section('title', 'Pengguna — Admin')
@section('page-title', 'Pengguna')
@section('page-subtitle', 'Kelola akun admin dan operator.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Daftar Pengguna</h2>
            <a class="btn btn--primary btn--sm" href="{{ route('admin.users.create') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Pengguna
            </a>
        </div>

        @if ($users->isEmpty())
            <p class="admin-empty">Belum ada pengguna.</p>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="admin-table__col--action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a class="btn btn--ghost btn--sm" href="{{ route('admin.users.show', $user) }}">Lihat</a>
                                    @if ($user->id !== auth()->id())
                                        <a class="btn btn--ghost btn--sm" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn--ghost btn--sm text-danger" onclick="return confirm('Yakin menghapus pengguna ini?')">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        @endif
    </div>
@endsection

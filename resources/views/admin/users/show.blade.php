@extends('layouts.admin')

@section('title', 'Detail Pengguna — Admin')
@section('page-title', 'Detail Pengguna')
@section('page-subtitle', 'Lihat detail akun pengguna.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>{{ $user->name }}</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.users.edit', $user) }}">Edit</a>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.users.index') }}">Kembali</a>
        </div>

        <div class="admin-card__body">
            <dl class="admin-detail">
                <dt>Email</dt>
                <dd>{{ $user->email }}</dd>
                <dt>Role</dt>
                <dd>{{ $user->role }}</dd>
                <dt>Daftar pada</dt>
                <dd>{{ $user->created_at->format('d M Y H:i') }}</dd>
            </dl>
        </div>

        <div class="admin-card__body">
            <h3>Artikel ({{ $user->posts->count() }})</h3>
            <p class="admin-empty">{{ $user->posts->isEmpty() ? 'Belum ada artikel.' : 'Lihat daftar artikel pengguna ini.' }}</p>
        </div>

        <div class="admin-card__body">
            <h3>Galeri ({{ $user->galleries->count() }})</h3>
            <p class="admin-empty">{{ $user->galleries->isEmpty() ? 'Belum ada item galeri.' : 'Lihat daftar item galeri pengguna ini.' }}</p>
        </div>
    </div>
@endsection

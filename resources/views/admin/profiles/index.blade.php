@extends('layouts.admin')

@section('title', 'Profil Sekolah — Admin')
@section('page-title', 'Profil Sekolah')
@section('page-subtitle', 'Kelola visi, misi, sejarah, dan akreditasi.')

@section('content')
    @if ($profile)
        <div class="admin-card">
            <div class="admin-card__head">
                <h2>Profil Sekolah</h2>
                <a class="btn btn--primary btn--sm" href="{{ route('admin.profile.update', $profile->id ?? 'profile') }}">Edit</a>
            </div>

            <div class="admin-card__body">
                <dl class="admin-detail">
                    <dt>Visi</dt>
                    <dd>{{ $profile->visi ?? '-' }}</dd>
                    <dt>Misi</dt>
                    <dd>{{ $profile->misi ?? '-' }}</dd>
                    <dt>Sejarah</dt>
                    <dd>{{ $profile->sejarah ?? '-' }}</dd>
                    <dt>Akreditasi</dt>
                    <dd>{{ $profile->akreditasi ?? '-' }}</dd>
                    <dt>Struktur Organisasi</dt>
                    <dd>{{ $profile->struktur_organisasi ?? '-' }}</dd>
                </dl>
            </div>
        </div>
    @else
        <div class="admin-card">
            <div class="admin-card__head">
                <h2>Profil Sekolah</h2>
                <a class="btn btn--primary btn--sm" href="{{ route('admin.profiles.update', 'profile') }}">Buat Profil</a>
            </div>
            <p class="admin-empty">Belum ada profil sekolah yang tersimpan.</p>
        </div>
    @endif
@endsection

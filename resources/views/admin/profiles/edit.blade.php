@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah — Admin')
@section('page-title', 'Edit Profil Sekolah')
@section('page-subtitle', 'Perbarui informasi profil sekolah.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Edit Profil Sekolah</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.profile.index') }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.profile.update', $profile ? $profile->id : 'profile') }}" class="admin-form">
            @csrf
            @method('PUT')
            <div class="admin-form__group">
                <label class="admin-form__label">Visi</label>
                <textarea name="visi" class="admin-form__input" rows="3">{{ old('visi', $profile->visi ?? '') }}</textarea>
                @error('visi') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Misi</label>
                <textarea name="misi" class="admin-form__input" rows="3">{{ old('misi', $profile->misi ?? '') }}</textarea>
                @error('misi') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Sejarah</label>
                <textarea name="sejarah" class="admin-form__input" rows="4">{{ old('sejarah', $profile->sejarah ?? '') }}</textarea>
                @error('sejarah') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Akreditasi</label>
                <input type="text" name="akreditasi" value="{{ old('akreditasi', $profile->akreditasi ?? '') }}" class="admin-form__input" placeholder="Contoh: A">
                @error('akreditasi') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Struktur Organisasi</label>
                <textarea name="struktur_organisasi" class="admin-form__input" rows="4">{{ old('struktur_organisasi', $profile->struktur_organisasi ?? '') }}</textarea>
                @error('struktur_organisasi') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.profiles.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

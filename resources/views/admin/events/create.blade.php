@extends('layouts.admin')

@section('title', 'Tambah Kegiatan — Admin')
@section('page-title', 'Tambah Kegiatan')
@section('page-subtitle', 'Buat jadwal kegiatan baru.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Tambah Kegiatan</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.events.index') }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.events.store') }}" class="admin-form">
            @csrf
            <div class="admin-form__group">
                <label class="admin-form__label">Judul</label>
                <input type="text" name="title" required value="{{ old('title') }}" class="admin-form__input" placeholder="Contoh: Upacara Peringatan HUT">
                @error('title') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Deskripsi</label>
                <textarea name="description" class="admin-form__input" rows="3">{{ old('description') }}</textarea>
                @error('description') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Tanggal Mulai</label>
                <input type="date" name="start_date" required value="{{ old('start_date') }}" class="admin-form__input">
                @error('start_date') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Tanggal Selesai</label>
                <input type="date" name="end_date" value="{{ old('end_date') }}" class="admin-form__input">
                @error('end_date') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Lokasi</label>
                <input type="text" name="location" value="{{ old('location') }}" class="admin-form__input" placeholder="Contoh: Lapangan Upacara">
                @error('location') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.events.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

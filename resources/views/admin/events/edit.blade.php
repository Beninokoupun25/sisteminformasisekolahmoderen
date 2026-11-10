@extends('layouts.admin')

@section('title', 'Edit Kegiatan — Admin')
@section('page-title', 'Edit Kegiatan')
@section('page-subtitle', 'Perbarui data kegiatan.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Edit Kegiatan</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.events.show', $event) }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.events.update', $event) }}" class="admin-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="admin-form__group">
                <label class="admin-form__label">Judul</label>
                <input type="text" name="title" required value="{{ old('title', $event->title) }}" class="admin-form__input">
                @error('title') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Deskripsi</label>
                <textarea name="description" class="admin-form__input" rows="3">{{ old('description', $event->description) }}</textarea>
                @error('description') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Tanggal Mulai</label>
                <input type="date" name="start_date" required value="{{ old('start_date', $event->start_date->format('Y-m-d')) }}" class="admin-form__input">
                @error('start_date') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Tanggal Selesai</label>
                <input type="date" name="end_date" value="{{ old('end_date', $event->end_date?->format('Y-m-d')) }}" class="admin-form__input">
                @error('end_date') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $event->location) }}" class="admin-form__input">
                @error('location') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Gambar Kegiatan</label>
                @if ($event->image_url)
                    <img class="admin-image-preview" src="{{ $event->image_url }}" alt="{{ $event->title }}">
                @endif
                <input type="file" name="image" accept="image/*" class="admin-form__input">
                <p class="admin-form__hint">Biarkan kosong jika tidak ingin mengganti gambar. Format JPG, PNG, atau WEBP. Maksimal 2 MB.</p>
                @error('image') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.events.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

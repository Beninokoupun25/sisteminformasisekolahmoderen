@extends('layouts.admin')

@section('title', 'Edit Galeri — Admin')
@section('page-title', 'Edit Galeri')
@section('page-subtitle', 'Perbarui data item galeri.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Edit Galeri</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.galleries.show', $gallery) }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.galleries.update', $gallery) }}" class="admin-form">
            @csrf
            @method('PUT')
            <div class="admin-form__group">
                <label class="admin-form__label">Judul</label>
                <input type="text" name="title" required value="{{ old('title', $gallery->title) }}" class="admin-form__input">
                @error('title') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Deskripsi</label>
                <textarea name="description" class="admin-form__input" rows="3">{{ old('description', $gallery->description) }}</textarea>
                @error('description') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Tipe</label>
                <select name="type" class="admin-form__input" required>
                    <option value="foto" {{ old('type', $gallery->type) === 'foto' ? 'selected' : '' }}>Foto</option>
                    <option value="video" {{ old('type', $gallery->type) === 'video' ? 'selected' : '' }}>Video</option>
                </select>
                @error('type') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Path File</label>
                <input type="text" name="file_path" value="{{ old('file_path', $gallery->file_path) }}" class="admin-form__input" required>
                @error('file_path') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Path Thumbnail</label>
                <input type="text" name="thumbnail_path" value="{{ old('thumbnail_path', $gallery->thumbnail_path) }}" class="admin-form__input">
                @error('thumbnail_path') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.galleries.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

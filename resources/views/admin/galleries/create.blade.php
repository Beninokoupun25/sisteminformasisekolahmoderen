@extends('layouts.admin')

@section('title', 'Tambah Galeri — Admin')
@section('page-title', 'Tambah Galeri')
@section('page-subtitle', 'Unggah foto atau video kegiatan.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Tambah Galeri</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.galleries.index') }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.galleries.store') }}" class="admin-form">
            @csrf
            <div class="admin-form__group">
                <label class="admin-form__label">Judul</label>
                <input type="text" name="title" required value="{{ old('title') }}" class="admin-form__input" placeholder="Contoh: Lomba Sains 2026">
                @error('title') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Deskripsi</label>
                <textarea name="description" class="admin-form__input" rows="3">{{ old('description') }}</textarea>
                @error('description') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Tipe</label>
                <select name="type" class="admin-form__input" required>
                    <option value="foto" {{ old('type') === 'foto' ? 'selected' : '' }}>Foto</option>
                    <option value="video" {{ old('type') === 'video' ? 'selected' : '' }}>Video</option>
                </select>
                @error('type') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Path File</label>
                <input type="text" name="file_path" value="{{ old('file_path') }}" class="admin-form__input" placeholder="Contoh: galeri/foto/lomba.jpg">
                @error('file_path') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Path Thumbnail</label>
                <input type="text" name="thumbnail_path" value="{{ old('thumbnail_path') }}" class="admin-form__input" placeholder="Contoh: galeri/thumb/lomba.jpg">
                @error('thumbnail_path') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.galleries.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

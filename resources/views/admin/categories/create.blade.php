@extends('layouts.admin')

@section('title', 'Tambah Kategori — Admin')
@section('page-title', 'Tambah Kategori')
@section('page-subtitle', 'Buat kategori baru untuk mengelompokkan artikel.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Tambah Kategori</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.categories.index') }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.categories.store') }}" class="admin-form">
            @csrf
            <div class="admin-form__group">
                <label class="admin-form__label">Nama Kategori</label>
                <input type="text" name="name" required value="{{ old('name') }}" class="admin-form__input" placeholder="Contoh: Akademik">
                @error('name') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Slug</label>
                <input type="text" name="slug" required value="{{ old('slug') }}" class="admin-form__input" placeholder="Contoh: akademik">
                @error('slug') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Deskripsi</label>
                <textarea name="description" class="admin-form__input" rows="3">{{ old('description') }}</textarea>
                @error('description') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.categories.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

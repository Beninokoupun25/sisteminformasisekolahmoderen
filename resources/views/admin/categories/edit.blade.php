@extends('layouts.admin')

@section('title', 'Edit Kategori — Admin')
@section('page-title', 'Edit Kategori')
@section('page-subtitle', 'Perbarui data kategori.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Edit Kategori</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.categories.show', $category) }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="admin-form">
            @csrf
            @method('PUT')
            <div class="admin-form__group">
                <label class="admin-form__label">Nama Kategori</label>
                <input type="text" name="name" required value="{{ old('name', $category->name) }}" class="admin-form__input">
                @error('name') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Slug</label>
                <input type="text" name="slug" required value="{{ old('slug', $category->slug) }}" class="admin-form__input">
                @error('slug') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Deskripsi</label>
                <textarea name="description" class="admin-form__input" rows="3">{{ old('description', $category->description) }}</textarea>
                @error('description') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.categories.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

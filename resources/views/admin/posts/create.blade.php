@extends('layouts.admin')

@section('title', 'Tambah Artikel — Admin')
@section('page-title', 'Tambah Artikel')
@section('page-subtitle', 'Tulis artikel atau berita baru.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Tambah Artikel</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.posts.index') }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.posts.store') }}" class="admin-form">
            @csrf
            <div class="admin-form__group">
                <label class="admin-form__label">Judul</label>
                <input type="text" name="title" required value="{{ old('title') }}" class="admin-form__input" placeholder="Contoh: Penerimaan Peserta Didik Baru">
                @error('title') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Slug</label>
                <input type="text" name="slug" required value="{{ old('slug') }}" class="admin-form__input" placeholder="Contoh: penerimaan-peserta-didik-baru">
                @error('slug') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Kategori</label>
                <select name="category_id" class="admin-form__input">
                    <option value="">Tanpa Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Tipe</label>
                <input type="text" name="type" value="{{ old('type') }}" class="admin-form__input" placeholder="Contoh: berita">
                @error('type') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Status</label>
                <select name="status" class="admin-form__input" required>
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="publish" {{ old('status') === 'publish' ? 'selected' : '' }}>Publish</option>
                    <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Arsip</option>
                </select>
                @error('status') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Excerpt</label>
                <textarea name="excerpt" class="admin-form__input" rows="3">{{ old('excerpt') }}</textarea>
                @error('excerpt') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Isi</label>
                <textarea name="body" class="admin-form__input" rows="8">{{ old('body') }}</textarea>
                @error('body') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Gambar Unggulan (URL)</label>
                <input type="url" name="featured_image" value="{{ old('featured_image') }}" class="admin-form__input">
                @error('featured_image') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Tanggal Publikasi</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="admin-form__input">
                @error('published_at') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Tags</label>
                <select name="tags[]" multiple class="admin-form__input">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                @error('tags') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.posts.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Edit Tag — Admin')
@section('page-title', 'Edit Tag')
@section('page-subtitle', 'Perbarui data tag.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Edit Tag</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.tags.show', $tag) }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.tags.update', $tag) }}" class="admin-form">
            @csrf
            @method('PUT')
            <div class="admin-form__group">
                <label class="admin-form__label">Nama Tag</label>
                <input type="text" name="name" required value="{{ old('name', $tag->name) }}" class="admin-form__input">
                @error('name') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Slug</label>
                <input type="text" name="slug" required value="{{ old('slug', $tag->slug) }}" class="admin-form__input">
                @error('slug') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.tags.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

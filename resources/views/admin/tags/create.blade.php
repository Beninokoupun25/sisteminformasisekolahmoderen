@extends('layouts.admin')

@section('title', 'Tambah Tag — Admin')
@section('page-title', 'Tambah Tag')
@section('page-subtitle', 'Buat tag baru untuk artikel.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Tambah Tag</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.tags.index') }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.tags.store') }}" class="admin-form">
            @csrf
            <div class="admin-form__group">
                <label class="admin-form__label">Nama Tag</label>
                <input type="text" name="name" required value="{{ old('name') }}" class="admin-form__input" placeholder="Contoh: Akademik">
                @error('name') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Slug</label>
                <input type="text" name="slug" required value="{{ old('slug') }}" class="admin-form__input" placeholder="Contoh: akademik">
                @error('slug') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.tags.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

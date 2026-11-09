@extends('layouts.admin')

@section('title', 'Tambah Pengguna — Admin')
@section('page-title', 'Tambah Pengguna')
@section('page-subtitle', 'Buat akun admin atau operator baru.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Tambah Pengguna</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.users.index') }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.users.store') }}" class="admin-form">
            @csrf
            <div class="admin-form__group">
                <label class="admin-form__label">Nama</label>
                <input type="text" name="name" required value="{{ old('name') }}" class="admin-form__input" placeholder="Contoh: Budi Santoso">
                @error('name') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}" class="admin-form__input" placeholder="Contoh: budi@sekolah.sch.id">
                @error('email') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Password</label>
                <input type="password" name="password" required minlength="8" class="admin-form__input">
                @error('password') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required minlength="8" class="admin-form__input">
                @error('password_confirmation') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Role</label>
                <select name="role" class="admin-form__input" required>
                    <option value="super_admin" {{ old('role') === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="operator" {{ old('role') === 'operator' ? 'selected' : '' }}>Operator</option>
                </select>
                @error('role') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a class="btn btn--ghost" href="{{ route('admin.users.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Edit Pengguna — Admin')
@section('page-title', 'Edit Pengguna')
@section('page-subtitle', 'Perbarui data akun pengguna.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>Edit Pengguna</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.users.show', $user) }}">Kembali</a>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="admin-form">
            @csrf
            @method('PUT')
            <div class="admin-form__group">
                <label class="admin-form__label">Nama</label>
                <input type="text" name="name" required value="{{ old('name', $user->name) }}" class="admin-form__input">
                @error('name') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Email</label>
                <input type="email" name="email" required value="{{ old('email', $user->email) }}" class="admin-form__input">
                @error('email') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" minlength="8" class="admin-form__input">
                @error('password') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" minlength="8" class="admin-form__input">
                @error('password_confirmation') <p class="admin-form__error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-form__group">
                <label class="admin-form__label">Role</label>
                <select name="role" class="admin-form__input" required>
                    <option value="super_admin" {{ old('role', $user->role) === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="operator" {{ old('role', $user->role) === 'operator' ? 'selected' : '' }}>Operator</option>
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

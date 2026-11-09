@extends('layouts.auth')

@section('title', 'Log in — SMAN 17 MALTENG')
@section('description', 'Masuk ke Sistem Informasi SMAN 17 MALTENG untuk mengelola informasi dan konten sekolah.')

@section('content')
<div class="auth-card">
    <a class="auth-back" href="{{ route('home') }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5"/><path d="m11 18-6-6 6-6"/></svg>
        Kembali ke beranda
    </a>

    <h1>Log in</h1>
    <p class="auth-card__lead">Masuk untuk mengelola informasi dan konten sekolah.</p>

    @if ($errors->any())
        <div class="auth__error" role="alert">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16h.01"/></svg>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <div class="form-field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@sman17malteng.sch.id">
        </div>

        <div class="form-field">
            <label for="password">Kata Sandi</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi">
        </div>

        <div class="form-row">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="1">
                Ingat saya
            </label>
            <a href="{{ route('home') }}#kontak">Butuh bantuan?</a>
        </div>

        <button type="submit" class="btn btn--primary">Log in</button>
    </form>
</div>
@endsection
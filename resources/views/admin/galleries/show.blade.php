@extends('layouts.admin')

@section('title', 'Detail Galeri — Admin')
@section('page-title', 'Detail Galeri')
@section('page-subtitle', 'Lihat detail item galeri.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>{{ $gallery->title }}</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.galleries.edit', $gallery) }}">Edit</a>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.galleries.index') }}">Kembali</a>
        </div>

        <div class="admin-card__body">
            <dl class="admin-detail">
                <dt>Tipe</dt>
                <dd>{{ $gallery->type }}</dd>
                <dt>Deskripsi</dt>
                <dd>{{ $gallery->description ?? '-' }}</dd>
                <dt>Pengunggah</dt>
                <dd>{{ $gallery->user->name ?? '-' }}</dd>
                <dt>File</dt>
                <dd>{{ $gallery->file_path ?? '-' }}</dd>
                <dt>Thumbnail</dt>
                <dd>{{ $gallery->thumbnail_path ?? '-' }}</dd>
                <dt>Dibuat</dt>
                <dd>{{ $gallery->created_at->format('d M Y H:i') }}</dd>
            </dl>
        </div>
    </div>
@endsection

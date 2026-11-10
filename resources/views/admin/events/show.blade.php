@extends('layouts.admin')

@section('title', 'Detail Kegiatan — Admin')
@section('page-title', 'Detail Kegiatan')
@section('page-subtitle', 'Lihat detail kegiatan.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>{{ $event->title }}</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.events.edit', $event) }}">Edit</a>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.events.index') }}">Kembali</a>
        </div>

        @if ($event->image_url)
            <div class="admin-card__body">
                <img class="admin-image-preview" src="{{ $event->image_url }}" alt="{{ $event->title }}">
            </div>
        @endif

        <div class="admin-card__body">
            <dl class="admin-detail">
                <dt>Deskripsi</dt>
                <dd>{{ $event->description ?? '-' }}</dd>
                <dt>Tanggal Mulai</dt>
                <dd>{{ $event->start_date->format('d M Y') }}</dd>
                <dt>Tanggal Selesai</dt>
                <dd>{{ $event->end_date?->format('d M Y') ?? '-' }}</dd>
                <dt>Lokasi</dt>
                <dd>{{ $event->location ?? '-' }}</dd>
                <dt>Pengatur</dt>
                <dd>{{ $event->user->name ?? '-' }}</dd>
                <dt>Dibuat</dt>
                <dd>{{ $event->created_at->format('d M Y H:i') }}</dd>
            </dl>
        </div>
    </div>
@endsection

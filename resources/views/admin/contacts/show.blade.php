@extends('layouts.admin')

@section('title', 'Detail Kontak — Admin')
@section('page-title', 'Detail Pesan')
@section('page-subtitle', 'Lihat isi pesan kontak.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__head">
            <h2>{{ $contact->subject }}</h2>
            <a class="btn btn--ghost btn--sm" href="{{ route('admin.contacts.index') }}">Kembali</a>
        </div>

        <div class="admin-card__body">
            <dl class="admin-detail">
                <dt>Nama</dt>
                <dd>{{ $contact->name }}</dd>
                <dt>Email</dt>
                <dd>{{ $contact->email }}</dd>
                <dt>Subjek</dt>
                <dd>{{ $contact->subject }}</dd>
                <dt>Status</dt>
                <dd><span class="badge badge--{{ $contact->read_at ? 'success' : 'warning' }}">{{ $contact->read_at ? 'Dibaca' : 'Belum Dibaca' }}</span></dd>
                <dt>Dikirim</dt>
                <dd>{{ $contact->created_at->format('d M Y H:i') }}</dd>
                @if ($contact->read_at)
                    <dt>Dibaca pada</dt>
                    <dd>{{ $contact->read_at->format('d M Y H:i') }}</dd>
                @endif
            </dl>
        </div>

        <div class="admin-card__body">
            <h3>Pesan</h3>
            <div class="admin-prose">{{ nl2br(e($contact->message)) }}</div>
        </div>
    </div>
@endsection

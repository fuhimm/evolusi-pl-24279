@extends('tugas.layout')

@section('title', $tugas->judul)

@section('content')
    <h1>{{ $tugas->judul }}</h1>
    <p>{{ $tugas->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
    <p>Status: <strong>{{ $tugas->selesai ? 'Selesai' : 'Belum selesai' }}</strong></p>
    <p>
        <a href="{{ route('tugas.edit', $tugas) }}">Ubah</a> |
        <a href="{{ route('tugas.index') }}">Kembali</a>
    </p>
@endsection

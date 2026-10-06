@extends('tugas.layout')

@section('title', 'Tambah Tugas')

@section('content')
    <h1>Tambah Tugas</h1>
    <form method="POST" action="{{ route('tugas.store') }}">
        @include('tugas._form')
    </form>
@endsection

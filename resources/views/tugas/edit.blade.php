@extends('tugas.layout')

@section('title', 'Ubah Tugas')

@section('content')
    <h1>Ubah Tugas</h1>
    <form method="POST" action="{{ route('tugas.update', $tugas) }}">
        @method('PUT')
        @include('tugas._form')
    </form>
@endsection

@extends('tugas.layout')

@section('title', 'Daftar Tugas!')

@section('content')
    <h1>Daftar Tugas!</h1>
    <p><a class="btn" href="{{ route('tugas.create') }}">Tambah tugas</a></p>

    @if ($daftar->isEmpty())
        <p>Belum ada tugas.</p>
    @else
        <table>
            <thead>
                <tr><th>Judul</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @foreach ($daftar as $tugas)
                    <tr>
                        <td><a href="{{ route('tugas.show', $tugas) }}">{{ $tugas->judul }}</a></td>
                        <td>{{ $tugas->selesai ? 'Selesai' : 'Belum selesai' }}</td>
                        <td>
                            <a href="{{ route('tugas.edit', $tugas) }}">Ubah</a>
                            <form class="inline" method="POST" action="{{ route('tugas.destroy', $tugas) }}" onsubmit="return confirm('Hapus tugas ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

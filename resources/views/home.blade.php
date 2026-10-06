<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $matkul }} - Praktikum</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
            background: #f1f5f9;
            color: #0f172a;
        }
        .card {
            width: min(92vw, 520px);
            background: #fff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .12);
        }
        .badge {
            display: inline-block;
            padding: .2rem .7rem;
            border-radius: 999px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: .8rem;
            font-weight: 600;
        }
        h1 { margin: .8rem 0 1.2rem; font-size: 1.5rem; }
        dl { display: grid; grid-template-columns: 8rem 1fr; gap: .6rem 1rem; margin: 0; }
        dt { color: #64748b; }
        dd { margin: 0; font-weight: 600; }
        footer { margin-top: 1.5rem; font-size: .85rem; color: #64748b; }
    </style>
</head>
<body>
    <main class="card">
        <span class="badge">Praktikum KEPL</span>
        <h1>{{ $matkul }}</h1>
        <dl>
            <dt>Nama</dt><dd>{{ $nama }}</dd>
            <dt>NIM</dt><dd>{{ $nim }}</dd>
            <dt>Kelas</dt><dd>{{ $kelas }}</dd>
            <dt>Mata Kuliah</dt><dd>{{ $matkul }}</dd>
        </dl>
        <footer>Aplikasi Laravel {{ app()->version() }} &middot; PHP {{ PHP_VERSION }}</footer>
    </main>
</body>
</html>

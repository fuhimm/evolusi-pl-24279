<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daftar Tugas')</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: system-ui, "Segoe UI", sans-serif; background: #f1f5f9; color: #0f172a; }
        main { width: min(94vw, 760px); margin: 2rem auto; background: #fff; padding: 1.5rem 2rem; border-radius: 12px; box-shadow: 0 6px 20px rgba(15, 23, 42, .1); }
        h1 { margin-top: 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: .5rem; border-bottom: 1px solid #e2e8f0; }
        a { color: #1d4ed8; }
        .btn { display: inline-block; padding: .35rem .8rem; border: 0; border-radius: 6px; background: #1d4ed8; color: #fff; text-decoration: none; cursor: pointer; font: inherit; }
        .btn.danger { background: #dc2626; }
        .status { padding: .6rem 1rem; background: #dcfce7; border-radius: 6px; margin-bottom: 1rem; }
        .error { color: #dc2626; font-size: .9rem; }
        label { display: block; margin: .8rem 0 .2rem; font-weight: 600; }
        input[type=text], textarea { width: 100%; padding: .5rem; border: 1px solid #cbd5e1; border-radius: 6px; font: inherit; }
        form.inline { display: inline; }
    </style>
</head>
<body>
    <main>
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>

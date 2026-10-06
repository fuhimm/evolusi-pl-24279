# evolusi-pl-24279

Repository praktikum **Konstruksi dan Evolusi Perangkat Lunak**. Berisi aplikasi web Laravel sederhana yang dikembangkan bertahap untuk Tugas 1 sampai 4 (Git, CI/CD, Vue, Docker).

## Identitas

| | |
|---|---|
| Nama | Ahmad Fahim |
| NIM | 24/545644/SV/24279 |
| Kelas | AA |
| Mata kuliah | Konstruksi dan Evolusi Perangkat Lunak |
| Dosen pengampu | Galih Malela Damaraji, S.Pd., M.Eng. |

## Tech stack

- PHP 8.3 dan Laravel 12
- Blade untuk tampilan, SQLite sebagai basis data bawaan
- GitHub Actions untuk Continuous Integration

## Alur branch

```
feature/<nama>  ->  dev  ->  main
```

- `main` berisi kode yang stabil, `dev` menjadi tempat integrasi.
- Setiap perubahan dikerjakan di `feature/<nama>` yang dibuat dari `dev`.
- Perubahan masuk lewat Pull Request, digabung dengan *merge commit*. Tidak ada push langsung ke `main`.
- Pesan commit mengikuti Conventional Commits: `feat`, `fix`, `docs`, `refactor`, `test`, `chore`, `ci`.

## Workflow CI

File: `.github/workflows/ci.yml` (nama workflow **Laravel CI**).

| Job | Nama tampilan | Fungsi |
|---|---|---|
| `build` | Build Laravel | Pasang dependensi Composer, siapkan `.env`, jalankan `php artisan about` |
| `test` | Run Tests | Dijalankan setelah `build` (`needs: build`), menjalankan `php artisan test` |

Workflow berjalan pada push ke `main`, `dev`, `feature/**` dan pada Pull Request ke `main` atau `dev`. Izin dibatasi `contents: read`.

## Menjalankan secara lokal

Prasyarat: PHP 8.3, Composer.

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan test
php artisan serve
```

Aplikasi dapat dibuka di `http://127.0.0.1:8000`.

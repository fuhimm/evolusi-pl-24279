# evolusi-pl-24279

Repository praktikum **Konstruksi dan Evolusi Perangkat Lunak**. Berisi aplikasi web Laravel sederhana yang dikembangkan bertahap untuk Tugas 1 sampai 4 (Git, CI/CD, Vue, Docker).

## Identitas

| | |
|---|---|
| Nama | Ahmad Fahim |
| NIM | 24/535644/SV/24279 |
| Kelas | AA |
| Mata kuliah | Konstruksi dan Evolusi Perangkat Lunak |
| Dosen pengampu | Galih Malela Damaraji, S.Pd., M.Eng. |

## Tech stack

- PHP 8.3 dan Laravel 12
- Blade untuk tampilan, SQLite sebagai basis data bawaan
- GitHub Actions untuk Continuous Integration dan Continuous Deployment

## Fitur

- Halaman beranda (`/`) berisi identitas praktikum.
- CRUD **tugas** (`/tugas`): kolom `judul` (string), `deskripsi` (text), `selesai` (boolean), lengkap dengan validasi input dan feature test.

## Alur branch

```
feature/<nama>  ->  dev  ->  main
```

- `main` berisi kode yang stabil, `dev` menjadi tempat integrasi.
- Setiap perubahan dikerjakan di `feature/<nama>` yang dibuat dari `dev`.
- Perubahan masuk lewat Pull Request, digabung dengan *merge commit*. Tidak ada push langsung ke `main`.
- Pesan commit mengikuti Conventional Commits: `feat`, `fix`, `docs`, `refactor`, `test`, `chore`, `ci`.

## Workflow CI/CD

File: `.github/workflows/ci.yml` (nama workflow **Laravel CI/CD**). Berjalan pada push ke `main`, `dev`, `feature/**` dan pada Pull Request ke `main` atau `dev`. Izin dibatasi `contents: read`.

| Job | Nama tampilan | Fungsi |
|---|---|---|
| `build` | Build Laravel | `composer install --optimize-autoloader`, siapkan `.env`, `php artisan about` |
| `test` | Run Tests | `needs: build`, menjalankan `php artisan test` |
| `staging` | Deploy Staging | `needs: test`, simulasi deploy dengan `echo` |
| `production` | Deploy Production | `needs: staging`, menjalankan `bash deploy.sh` |

Job `production` dijaga dua lapis:

1. Kondisi `if: github.ref == 'refs/heads/main' && github.event_name == 'push'`, sehingga **dilewati (skipped)** pada branch fitur dan Pull Request.
2. Environment `production` dengan *required reviewer*, sehingga job berhenti pada status *Waiting for approval* sampai disetujui manual.

### deploy.sh

Skrip `deploy.sh` memakai `set -e` dan menuliskan tujuh langkah deploy Laravel sebagai `echo`:

1. `php artisan down --retry=60`
2. `git pull origin main`
3. `composer install --no-dev --optimize-autoloader`
4. `php artisan migrate --force`
5. `php artisan config:cache && php artisan route:cache && php artisan view:cache`
6. `php artisan queue:restart`
7. `php artisan up`

## Menjalankan secara lokal

Prasyarat: PHP 8.3, Composer.

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan test
php artisan serve
```

Aplikasi dapat dibuka di `http://127.0.0.1:8000`, daftar tugas di `http://127.0.0.1:8000/tugas`.

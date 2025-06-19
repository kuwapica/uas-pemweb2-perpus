# UAS PEMROGRAMAN WEB 2 - Manajamen Peminjaman Buku Perpustakaan

Tugas ini dibangun dengan framework Laravel 12 dan Livewire 3 serta menggunakan Bootstrap 5.<br>

## Teknologi
- PHP 8.3
- Laravel 12
- Livewire 3
- Bootstrap
- MySQL

## Instalasi
- clone repository di folder www/htdocs
  ```
  git clone https://github.com/kuwapica/uas-pemweb2-perpus.git
  ```
- Instal Dependency
  ```
  composer install
  npm install
  npm run build
  ```
- Copy file environment dan konfigurasi database-nya
  ```
  cp .env.example .env
  php artisan key:generate
  ```
  untuk konfigurasi database, nama database bisa disesuaikan
- Migrasi Database
  ```
  php artisan migrate --seed
  ```
- Jalankan aplikasi dengan mengakses di browser: http://127.0.0.1:8000
  ```
  php artisan serve
  ```

## Login Default
Seeder membuat admin default:
```
Email : admin@mail.com
Password : admin1234
```
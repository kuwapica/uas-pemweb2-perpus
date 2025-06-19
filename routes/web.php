<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->name('login');

Route::get('/anggota/login', \App\Livewire\Mahasiswa\Auth\Login::class)
    ->name('login');

Route::get('/anggota/daftar', \App\Livewire\Mahasiswa\Auth\Register::class)
    ->name('mahasiswadaftar');

Route::middleware('auth:mahasiswa')->group(function () {
    Route::get('/daftarbuku', \App\Livewire\Mahasiswa\DaftarBuku::class)
        ->name('daftarbuku');

    Route::get('/daftarpinjaman', \App\Livewire\Mahasiswa\DaftarPinjaman::class)
        ->name('daftarpinjaman');
});

Route::get('/admin/login', \App\Livewire\Admin\Auth\Login::class)
    ->name('adminlogin');

Route::middleware('auth:admin')->group(function () {
    Route::get('/buku', \App\Livewire\Admin\Buku\Index::class)
        ->name('admin.buku');

    Route::get('/buku/tambah', \App\Livewire\Admin\Buku\Create::class)
        ->name('buku.tambah');

    Route::get('/buku/edit/{id}', \App\Livewire\Admin\Buku\Edit::class)
        ->name('buku.edit');

    Route::get('/anggota', \App\Livewire\Admin\Anggota\Index::class)
        ->name('admin.anggota');

    Route::get('/anggota/tambah', \App\Livewire\Admin\Anggota\Create::class)
        ->name('anggota.tambah');

    Route::get('/anggota/edit/{id}', \App\Livewire\Admin\Anggota\Edit::class)
        ->name('anggota.edit');

    Route::get('/peminjaman', \App\Livewire\Admin\Peminjaman\Index::class)
        ->name('admin.peminjaman');
});


// Route::middleware(middleware: 'auth')->group(function () {
//     Route::get('/buku', \App\Livewire\Admin\Buku\Index::class)->name('admin.buku');
// });

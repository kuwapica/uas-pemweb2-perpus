<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>
    @livewireStyles
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

</head>

<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a href="{{ route('admin.buku') }}" wire:navigate class="navbar-brand fw-bold">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-underline mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold {{ request()->routeIs('admin.buku') ? 'active' : '' }}"
                            href="{{ route('admin.buku') }}" wire:navigate>Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold {{ request()->routeIs('admin.anggota') ? 'active' : '' }}"
                            href="{{ route('admin.anggota') }}" wire:navigate>Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold {{ request()->routeIs('admin.peminjaman') ? 'active' : '' }}"
                            href="{{ route('admin.peminjaman') }}" wire:navigate>Peminjaman</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name ?? 'Guest' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <livewire:admin.auth.logout />
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function hapusBuku(id) {
            if (confirm('Yakin hapus?')) {
                Livewire.emit('hapusBuku', id);
            }
        }
    </script>
    @yield('javascripts')
</body>

</html>

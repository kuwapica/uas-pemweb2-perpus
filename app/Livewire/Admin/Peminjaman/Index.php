<?php

namespace App\Livewire\Admin\Peminjaman;

use Livewire\Component;
use App\Models\Peminjaman;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title(('Data Peminjaman Buku'))]
class Index extends Component
{
    public function kembalikanBuku($id)
    {
        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman) {
            session()->flash('message', 'Peminjaman tidak ditemukan.');
            return;
        }

        if ($peminjaman->tanggal_kembali) {
            session()->flash('message', 'Peminjaman sudah dikembalikan sebelumnya.');
            return;
        }

        $peminjaman->update([
            'tanggal_kembali' => now(),
        ]);

        session()->flash('message', 'Buku berhasil dikembalikan oleh admin.');
    }

    public function render()
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])
            ->orderByDesc('tanggal_pinjam')
            ->get();

        return view('livewire.admin.peminjaman.index', compact('peminjaman'));
    }
}

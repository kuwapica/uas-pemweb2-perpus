<?php

namespace App\Livewire\Mahasiswa;

use Livewire\Component;
use App\Models\Peminjaman;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.mahasiswa')]
#[Title(('Daftar Pinjaman'))]
class DaftarPinjaman extends Component
{
    public function kembalikanBuku($peminjaman_id)
    {
        $peminjaman = Peminjaman::where('id', $peminjaman_id)
            ->where('anggota_id', auth('mahasiswa')->id())
            ->whereNull('tanggal_kembali')
            ->first();

        if (!$peminjaman) {
            session()->flash('message', 'Peminjaman tidak ditemukan atau sudah dikembalikan.');
            return;
        }

        $peminjaman->update([
            'tanggal_kembali' => now(),
        ]);

        session()->flash('message', 'Buku berhasil dikembalikan.');
    }


    public function render()
    {
        $anggotaId = auth('mahasiswa')->id();
        $peminjaman = Peminjaman::where('anggota_id', $anggotaId)
            ->with('buku')
            ->get();
        return view('livewire.mahasiswa.daftar-pinjaman', compact('peminjaman'));
    }
}
